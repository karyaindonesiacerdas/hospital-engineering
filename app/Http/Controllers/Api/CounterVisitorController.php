<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CounterVisitor;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CounterVisitorController extends Controller
{
    public function listVisitorViews(Request $request)
    {
        try {
            $counters = CounterVisitor::select('counter_visitors.*')->with(array('visitor' => function ($query) {
                $query->select('id', 'name', 'institution_name', 'email', 'mobile', 'allow_share_info', 'province', 'referral');
            }));
            if (auth()->user()->role == 'exhibitor') {
                $counters->where('exhibitor_id', auth()->id());
            }
            if (auth()->user()->role == 'admin') {
                $counters->with(array('exhibitor' => function ($query) {
                    $query->select('id', 'company_name');
                }));
            }
            $counters->join('users', 'visitor_id', '=', 'users.id');
            if (($exhibitorId = $request->input('exhibitor_id'))) {
                $counters->where('counter_visitors.exhibitor_id', $exhibitorId);
            }
            if (($filter = $request->input('filter'))) {
                $counters->where(function($query) use ($filter) {
                    $query->where('users.name', 'like', "%{$filter}%")
                        ->orWhere('users.email', 'like', "%{$filter}%")
                        ->orWhere('users.mobile', 'like', "%{$filter}%")
                        ->orWhere('users.province', 'like', "%{$filter}%")
                        ->orWhere('users.institution_name', 'like', "%{$filter}%");
                });
            }
            if (($sortColumn = $request->input('sortColumn'))) {
                $sortDirection = $request->input('sortDirection') ?? 'ASC';
                if (in_array($sortColumn, ['name', 'email', 'mobile', 'province', 'institution_name', 'referral'])) {
                    $counters->orderBy("users.{$sortColumn}", $sortDirection);
                } else if ($sortColumn === 'created_at') {
                    $counters->orderBy('counter_visitors.created_at', $sortDirection);
                }
            } else {
                $counters->orderBy('counter_visitors.created_at', 'desc');
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrieved',
                'data' => $counters->paginate($request->input('limit', 50)),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function adminListVisitorViews(Request $request)
    {
        try {
            // if (auth()->user()->role !== 'admin') throw new \Exception('Access denied');
            if ($request->input('full') === '1') {
                $data = [
                    [
                        'id' => -1,
                        'name' => 'at_least_one',
                        'total_visitors' => User::withCount(['counters AS counters_count' => function($query) {
                            $query->select(\DB::raw('COUNT(DISTINCT(exhibitor_id))'));
                        }])->having('counters_count', '>=', 1)->count(),
                    ], [
                        'id' => -2,
                        'name' => 'all',
                        'total_visitors' => User::withCount(['counters AS counters_count' => function($query) {
                            $query->select(\DB::raw('COUNT(DISTINCT(exhibitor_id))'));
                        }])->having('counters_count', '>=', 18)->count(),
                    ]
                ];
            } else {
                $data = [];
            }
            $exhibitors = User::where('role', 'exhibitor')->get();
            foreach ($exhibitors as $exhibitor) {
                $counter = $exhibitor->counters_exhibitor()->whereYear('created_at', now()->year)->count();
                array_push($data, [
                    'id' => $exhibitor->id,
                    'company_name' => $exhibitor->company_name,
                    'total_visitors' => $counter,
                ]);
            }
            if ($data) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrieved',
                    'data' => $data,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function listWebinarAttendees(Request $request)
    {
        try {
            if (auth()->user()->role !== 'admin') throw new \Exception('Access denied');
            $counters = User::where('role', 'visitor');
            if (($webinarIds = $request->input('package_id'))) {
                $counters->where('surveyed_package_id', 'LIKE', '%"' . $webinarIds . '"%');
            } else {
                $counters->whereNotNull('surveyed_package_id');
            }
            if (($filter = $request->input('filter'))) {
                $counters->where(function($query) use ($filter) {
                    $query->where('users.name', 'like', "%{$filter}%")
                        ->orWhere('users.email', 'like', "%{$filter}%")
                        ->orWhere('users.mobile', 'like', "%{$filter}%")
                        ->orWhere('users.province', 'like', "%{$filter}%")
                        ->orWhere('users.institution_name', 'like', "%{$filter}%");
                });
            }
            if (($sortColumn = $request->input('sortColumn'))) {
                $sortDirection = $request->input('sortDirection') ?? 'ASC';
                if (in_array($sortColumn, ['name', 'email', 'mobile', 'province', 'institution_name', 'referral'])) {
                    $counters->orderBy($sortColumn, $sortDirection);
                } else {
                    $counters->orderBy('created_at', $sortDirection);
                }
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrieved',
                'data' => $counters->paginate($request->input('limit', 50)),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function adminListWebinarAttendees(Request $request)
    {
        try {
            // if (auth()->user()->role !== 'admin') throw new \Exception('Access denied');
            $data = [
                [
                    'id' => -1,
                    'name' => 'at_least_one',
                    'order' => 0,
                    'total_attendees' => [
                        'registered' => User::where('role', 'visitor')->where('package_id', '!=', '[]')->count(),
                        'surveyed' => User::where('role', 'visitor')->whereNotNull('surveyed_package_id')->count(),
                    ]
                ], [
                    'id' => -2,
                    'name' => 'all',
                    'order' => 0,
                    'total_attendees' => [
                        'registered' => User::where('role', 'visitor')->where('package_id', '["1","2","3","4","5","6"]')->count(),
                        'surveyed' => User::where('role', 'visitor')->where('surveyed_package_id', '["1","2","3","4","5","6"]')->count(),
                    ]
                ]
            ];
            $packages = Package::select('id', 'name', 'order')->get();
            foreach ($packages as $package) {
                $package['total_attendees'] = [
                    'registered' => User::where('role', 'visitor')->where('package_id', 'LIKE', '%"' . $package->id . '"%')->count(),
                    'surveyed' => User::where('role', 'visitor')->where('surveyed_package_id', 'LIKE', '%"' . $package->id . '"%')->count(),
                ];
                $data[] = $package;
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrieved',
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function randomizeVisitor(Request $request)
    {
        try {
            if (auth()->user()->role !== 'admin') throw new \Exception('Access denied');
            $boothIds = $request->input('booth_ids') ?? 'one';
            $webinarIds = $request->input('webinar_ids') ?? 'one';
            $winners = $request->input('winners');
            $data = [
                'total' => 0,
                'winner' => ['id' => 0, 'name' => ''],
                'list' => [],
            ];
            $query = User::select('users.id', 'users.name', 'users.mobile');
            if ($boothIds === 'all') {
                $query->withCount(['counters AS counters_count' => function($query) {
                    $query->select(\DB::raw('COUNT(DISTINCT(exhibitor_id))'));
                }])->having('counters_count', '>=', 18);
            } else if ($boothIds !== 'one') {
                $ids = explode(',', $boothIds);
                foreach ($ids as $id) {
                    $alias = "cv_{$id}";
                    $query->join("counter_visitors as {$alias}", function($join) use ($alias, $id) {
                        $join->on("{$alias}.visitor_id", '=', 'users.id');
                        $join->where("{$alias}.exhibitor_id", $id);
                    });
                }
            }
            if ($winners) {
                $query->whereNotIn('users.id', explode(',', $winners));
            }
            $conditions = [['users.name', '!=', '']];
            if ($webinarIds === 'all') {
                $conditions[] = ['users.surveyed_package_id', '=', '["1","2","3","4","5","6"]'];
            } else if ($webinarIds === 'one') {
                $conditions[] = ['users.surveyed_package_id', '!=', '\'[]\''];
            } else {
                $ids = explode(',', $webinarIds);
                sort($ids);
                $conditions[] = ['users.surveyed_package_id', 'LIKE', '%"' . implode('"%"', $ids) . '"%'];
            }
            $query->whereNotNull('users.name')
                ->where($conditions)
                ->distinct('users.id');
            $data['total'] = $query->count('users.id');
            if ($data['total']) {
                $limit = $data['total'] > 50 ? 50 : $data['total'];
                $offset = rand(0, $data['total'] - $limit);
                $visitors = $query->orderBy('users.id')
                    ->limit($limit)
                    ->offset($offset)
                    ->get();
                if (count($visitors)) {
                    $data['winner'] = $visitors[rand(0, count($visitors) - 1)];
                    foreach ($visitors as $visitor) {
                        array_push($data['list'], $visitor->name);
                    }
                } else {
                    throw new \Exception('Not enough candidates');
                }
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrieved',
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

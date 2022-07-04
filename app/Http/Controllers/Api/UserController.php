<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\CounterVisitor;
use App\Models\Position;
use App\Models\User;
use \Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function exhibitorList(Request $request)
    {
        try {
            $users = User::where('role', 'exhibitor')->whereYear('created_at', now()->year);
            if ($request->search) {
                $users->where('name', 'like', "%" . $request->search . "%");
            }
            if ($request->category) {
                $users->whereJsonContains('business_nature', $request->category);
            }
            // if ($request->show_package == 1) {
            //     $users = $users->where('package_id', '!=', null)->orderByDesc('package_id');
            // }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $users->get(['id', 'name', 'company_logo', 'company_name', 'business_nature', 'package_id', 'ala_carte', 'company_order', 'published', 'position', 'role', 'exhibitor_type', 'email', 'mobile']),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fetch failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function exhibitorDetail(User $user)
    {
        try {
            $data = collect(User::with('banners')->find($user->id))->except(['created_at', 'updated_at', 'email_verified_at', 'visit_purpose', 'product_interest', 'visitor_type', 'institution_type', 'institution_name']);
            $data['rewarded'] = false;

            if (auth()->user()->role == 'visitor') {
                $checkAlreadyExist = Activity::where(['causer_id' => auth()->id(), 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'booth'])->first();

                if (!$checkAlreadyExist) {
                    Activity::create(['causer_id' => auth()->id(), 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'booth']);
                    $data['rewarded'] = true;
                }

                if ($user->role == 'exhibitor') {
                    $hasVisitInTheLastHour = CounterVisitor::where('visitor_id', auth()->id())
                        ->where('exhibitor_id', $user->id)
                        ->where('created_at', '>=', Carbon::now()->subHour())
                        ->first();

                    if (!$hasVisitInTheLastHour) {
                        CounterVisitor::create([
                            'visitor_id' => auth()->id(),
                            'exhibitor_id' => $user->id,
                        ]);
                    }
                }
            }

            if ($user->role == 'exhibitor') {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Fetch succeed',
                    'data' => $data,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fetch failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function userList(Request $request)
    {
        try {
            $users = User::query();
            if ($request->status) {
                $users->where('status', $request->status);
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $users->paginate(7),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fetch failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function detailByEmail(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user = collect($user)->only(['id', 'name', 'email', 'mobile', 'institution_name']);

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data retrieved successfully',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'User Visitor Not Registered',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function listVisitor(Request $request)
    {
        try {
            if (auth()->user()->role !== 'admin') throw new \Exception('Access denied');
            $counters = User::where('role', 'visitor');
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

    public function demographicData(Request $request)
    {
        try {
            // if (auth()->user()->role !== 'admin') {
            //     throw new \Exception('Access denied');
            // }
            $top = 9;
            $filter = $request->filter;
            $mode = $request->mode;
            $filteredField = $mode === 'registered' ? 'package_id' : 'surveyed_package_id';

            $data = [
                'provinces' => [
                    'name' => 'Visitor / Province',
                    'labels' => [],
                    'series' => [
                        ['data' => [], 'name' => 'registered'],
                        ['data' => [], 'name' => 'actual'],
                    ]
                ],
                'positions' => [
                    'name' => 'Visitor / Job Position',
                    'labels' => [],
                    'series' => [],
                ],
                'institution_types' => [
                    'name' => 'Visitor / Institution Type',
                    'labels' => [],
                    'series' => [],
                ],
            ];

            $rquery = User::select('province', \DB::raw('count(*) as total'));
            $squery = User::select('province', \DB::raw('count(*) as total'));
            if ($filter && $filter !== 'all') {
                $rquery->where('package_id', 'LIKE', '%"' . $filter . '"%');
                $squery->where('surveyed_package_id', 'LIKE', '%"' . $filter . '"%');
            }
            $rprovinces = $rquery->groupBy('province')->orderBy('total', 'desc')->get();
            $sprovinces = $squery->groupBy('province')->orderBy('total', 'desc')->get();
            $mapper = [];
            foreach ($rprovinces as $province) {
                if (!(empty($province['province']) || in_array(trim($province['province']), ['-', 'other']))) {
                    $i = count($data['provinces']['labels']);
                    $mapper[$province['province']] = $i;
                    $data['provinces']['labels'][$i] = $province['province'];
                    $data['provinces']['series'][0]['data'][$i] = $province['total'];
                    $data['provinces']['series'][1]['data'][$i] = 0;
                }
            }
            foreach ($sprovinces as $province) {
                if (!(empty($province['province']) || in_array(trim($province['province']), ['-', 'other']))) {
                    if (array_key_exists($province['province'], $mapper)) {
                        $i = $mapper[$province['province']];
                    } else {
                        $i = count($data['provinces']['labels']);
                        $data['provinces']['labels'][$i] = $province['province'];
                        $data['provinces']['series'][0]['data'][$i] = 0;
                    }
                    $data['provinces']['series'][1]['data'][$i] = $province['total'];
                }
            }
            if ($filter === 'all') {
                unset($data['provinces']['series'][1]);
            }

            $positions = Position::select('id', 'name')->get();
            $positionMappers = [];
            foreach ($positions as $position) {
                $positionMappers["p{$position['id']}"] = $position['name'];
            }
            $query = User::select('position_id', \DB::raw('count(*) as total'));
            if ($filter && $filter !== 'all') {
                $query->where($filteredField, 'LIKE', '%"' . $filter . '"%');
            }
            $positions = $query->groupBy('position_id')->orderBy('total', 'desc')->get();
            $others = 0;
            foreach ($positions as $position) {
                $key = "p{$position['position_id']}";
                if (empty($position['total'])) {
                    continue;
                }
                if (!(empty($position['position_id']) || !array_key_exists($key, $positionMappers)) && count($data['positions']['labels']) < $top) {
                    $label = $positionMappers[$key];
                    $data['positions']['labels'][] = $label;
                    $data['positions']['series'][] = $position['total'];
                } else {
                    $others += $position['total'];
                }
            }
            if ($others > 0) {
                $data['positions']['labels'][] = "Others";
                $data['positions']['series'][] = $others;
            }

            $query = User::select('institution_type', \DB::raw('count(*) as total'));
            if ($filter && $filter !== 'all') {
                $query->where($filteredField, 'LIKE', '%"' . $filter . '"%');
            }
            $institutions = $query->groupBy('institution_type')->orderBy('total', 'desc')->get();
            $others = 0;
            foreach ($institutions as $institution) {
                if (empty($institution['total'])) {
                    continue;
                }
                if (!(empty($institution['institution_type']) || in_array(trim($institution['institution_type']), ['-', 'other', 'Other'])) && count($data['institution_types']['labels']) < $top) {
                    $data['institution_types']['labels'][] = $institution['institution_type'];
                    $data['institution_types']['series'][] = $institution['total'];
                } else {
                    $others += $institution['total'];
                }
            }
            if ($others > 0) {
                $data['institution_types']['labels'][] = "Others";
                $data['institution_types']['series'][] = $others;
            }

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}

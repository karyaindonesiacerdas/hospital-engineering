<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CounterVisitor;
use App\Models\User;
use Illuminate\Http\Request;

class CounterVisitorController extends Controller
{
    public function listVisitorViews(Request $request)
    {
        try {
            if (auth()->user()->role == 'exhibitor') {
                $counters = CounterVisitor::with(array('visitor' => function ($query) {
                    $query->select('id', 'name', 'institution_name', 'email', 'mobile', 'allow_share_info', 'province');
                }))->where('exhibitor_id', auth()->id());
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'data' => $counters->paginate(7),
                ], 200);
            }
            if (auth()->user()->role == 'admin') {
                $counters = CounterVisitor::with(array('visitor' => function ($query) {
                    // $query->where('allow_share_info', 1);
                    $query->select('id', 'name', 'institution_name', 'email', 'mobile', 'allow_share_info', 'province');
                }));
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'data' => $counters->paginate(7),
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrive',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function adminListVisitorViews(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $exhibitors = User::where('role', 'exhibitor')->get();
                $data = [];
                foreach ($exhibitors as $exhibitor) {
                    $counter = $exhibitor->counters_exhibitor->count();
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
                        'message' => 'Data successfully retrived',
                        'data' => $data,
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrive',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function adminListVisitorBoothViews(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $data = User::with(array('counters.exhibitor' => function ($query) {
                    $query->select('id', 'company_name');
                }))->has('counters')->select('id', 'name', 'institution_name')->paginate(5);
                if ($data) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully retrived',
                        'data' => $data,
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrive',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

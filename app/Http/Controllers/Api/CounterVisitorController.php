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
                $counters = auth()->user()->counters_exhibitor;
                if ($counters) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully retrived',
                        'data' => $counters->load(['visitor:id,name,institution_name,email,mobile']),
                    ], 200);
                }
            }
            if (auth()->user()->role == 'admin') {
                $counters = CounterVisitor::with(['visitor', 'exhibitor'])->get();
                if ($counters) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully retrived',
                        'data' => $counters->load(['visitor:id,name,institution_name,email,mobile']),
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
}

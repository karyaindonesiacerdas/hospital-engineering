<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CounterVisitor;
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
                        'message' => 'Data successfully saved',
                        'data' => $counters,
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to save',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function countVisitorViews(Request $request)
    {
        try {
            if (auth()->user()->role == 'visitor') {
                $checkAlreadyExist = CounterVisitor::where(['visitor_id' => auth()->id(), 'exhibitor_id' => $request->exhibitor_id])->first();
                if (!$checkAlreadyExist) {
                    $counter = auth()->user()->counters()->create(['exhibitor_id' => $request->exhibitor_id]);
                    if ($counter) {
                        return response()->json([
                            'code' => 200,
                            'type' => 'success',
                            'message' => 'Data successfully saved',
                            'data' => $counter,
                        ], 200);
                    }
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to save',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

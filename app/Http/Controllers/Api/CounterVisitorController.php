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
                        'message' => 'Data successfully saved',
                        'data' => $counters->load(['visitor:id,name,institution_name,email,mobile']),
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
}

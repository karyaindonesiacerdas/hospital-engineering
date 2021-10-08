<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TrackerController extends Controller
{
    public function index()
    {
        try {
            if (auth()->user()->role == 'admin') {
                $trackers = Tracker::with(array('user' => function ($query) {
                    $query->select('id', 'name', 'email', 'mobile', 'province');
                }))->paginate(7);
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'data' => $trackers,
                ], 200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
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

    public function store(Request $request)
    {
        try {
            if (auth()->check()) {
                $trackerAlreadyExist = Tracker::where(['ip' => $request->ip(), 'date' => Carbon::now()->toDate()])->first();
                if ($trackerAlreadyExist) {
                    $trackerAlreadyExist->update([
                        'user_id' => auth()->id()
                    ]);
                } else {
                    Tracker::create([
                        'ip' => $request->ip(),
                        'date' => Carbon::now()->toDate(),
                        'user_id' => auth()->id()
                    ]);
                }
            } else {
                $trackerAlreadyExistGuest = Tracker::where(['ip' => $request->ip(), 'date' => Carbon::now()->toDate()])->first();
                if (!$trackerAlreadyExistGuest) {
                    Tracker::create([
                        'ip' => $request->ip(),
                        'date' => Carbon::now()->toDate(),
                    ]);
                }
            }

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrived',
                'data' => 'Data saved',
            ], 200);
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

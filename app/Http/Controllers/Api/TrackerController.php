<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class TrackerController extends Controller
{
    public function index()
    {
        try {
            if (auth()->user()->role == 'admin') {
                $trackers = Tracker::with('user')->get()->groupBy('user.province')->map->count();
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'data' => [
                        'total' => count($trackers),
                        'data' => $trackers
                    ],
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
            $location = Location::get();
            if (auth()->check()) {
                $trackerAlreadyExist = Tracker::where(['ip' => $request->ip(), 'date' => Carbon::now()->toDateString()])->first();
                if ($trackerAlreadyExist) {
                    $trackerAlreadyExist->update([
                        'user_id' => auth()->id()
                    ]);
                } else {
                    Tracker::create([
                        'ip' => $request->ip(),
                        'date' => Carbon::now()->toDateString(),
                        'user_id' => auth()->id(),
                        'province' => $location->regionName,
                    ]);
                }
            } else {
                $trackerAlreadyExistGuest = Tracker::where(['ip' => $request->ip(), 'date' => Carbon::now()->toDateString()])->first();
                if (!$trackerAlreadyExistGuest) {
                    Tracker::create([
                        'ip' => $request->ip(),
                        'date' => Carbon::now()->toDateString(),
                        'province' => $location->regionName,
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

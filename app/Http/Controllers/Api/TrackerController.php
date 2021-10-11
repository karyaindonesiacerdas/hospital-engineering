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
            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://api.ipdata.co?api-key=fe40639e2842bdfa598df2f58eb9f3820fb1380c01cf0a574e0de68e');
            $location = json_decode($request->getBody());

            if (auth()->check()) {
                $trackerAlreadyExist = Tracker::where(['ip' => $location->ip, 'date' => Carbon::now()->toDateString()])->first();
                if ($trackerAlreadyExist) {
                    $trackerAlreadyExist->update([
                        'user_id' => auth()->id()
                    ]);
                } else {
                    Tracker::create([
                        'ip' => $location->ip,
                        'date' => Carbon::now()->toDateString(),
                        'user_id' => auth()->id(),
                        'province' => $location->region,
                    ]);
                }
            } else {
                $trackerAlreadyExistGuest = Tracker::where(['ip' => $request->ip(), 'date' => Carbon::now()->toDateString()])->first();
                if (!$trackerAlreadyExistGuest) {
                    Tracker::create([
                        'ip' => $request->ip(),
                        'date' => Carbon::now()->toDateString(),
                        'province' => $location->region,
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

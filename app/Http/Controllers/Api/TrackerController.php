<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    public function store(Request $request)
    {
        $ipAddress = $request->ip();
        try {
            if ($ipAddress) {
                if (auth()->check()) {
                    $trackerAlreadyExist = Tracker::where(['user_id' => auth()->id(), 'ip' => $ipAddress, 'date' => Carbon::now()->toDateString()])->first();
                    if ($trackerAlreadyExist) {
                        $trackerAlreadyExist->update([
                            'user_id' => auth()->id()
                        ]);
                    } else {
                        $client = new \GuzzleHttp\Client();
                        $request = $client->get('https://api.ipdata.co?api-key=fe40639e2842bdfa598df2f58eb9f3820fb1380c01cf0a574e0de68e');
                        $location = json_decode($request->getBody());

                        Tracker::create([
                            'ip' => $ipAddress,
                            'date' => Carbon::now()->toDateString(),
                            'user_id' => auth()->id(),
                            'province' => $location->region,
                        ]);
                    }
                } else {
                    $trackerAlreadyExistGuest = Tracker::where(['ip' => $ipAddress, 'date' => Carbon::now()->toDateString()])->first();
                    if (!$trackerAlreadyExistGuest) {
                        $client = new \GuzzleHttp\Client();
                        $request = $client->get('https://api.ipdata.co?api-key=fe40639e2842bdfa598df2f58eb9f3820fb1380c01cf0a574e0de68e');
                        $location = json_decode($request->getBody());

                        Tracker::create([
                            'ip' => $ipAddress,
                            'date' => Carbon::now()->toDateString(),
                            'province' => $location->region,
                        ]);
                    }
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

    public function index(Request $request)
    {
        // $users = Tracker::whereNull('province')->take(5)->get();
        // foreach ($users as $user) {
        //     $client = new \GuzzleHttp\Client();
        //     $request = $client->get('http://api.db-ip.com/addrinfo?api_key=bc2ab711d740d7cfa6fcb0ca8822cb327e38844f&addr=' . $user->ip);
        //     $location = json_decode($request->getBody());
        //     $user->update(['province' => $location->stateprov]);
        // }
        // return 'ok';
        try {
            if (auth()->user()->role == 'admin') {
                $trackers = Tracker::groupBy('province');
                if ($request->date) {
                    $trackers = $trackers->select('province', 'date', \DB::raw('count(*) as total'))->where('date', $request->date);
                } else {
                    $trackers = $trackers->select('province', 'date', \DB::raw('count(*) as total'))->where('date', Carbon::now()->toDateString());
                }
                $total = $trackers->pluck('total');

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'total' => $total->sum(),
                    'data' => $trackers->get()
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
}

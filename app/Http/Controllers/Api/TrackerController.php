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
                // $trackers = Tracker::with('user')->get()->groupBy('user.province')->map->count();
                $trackers = \DB::table('trackers')
                    ->join('users', 'trackers.user_id', '=', 'users.id')
                    ->select('users.province', \DB::raw('count(users.province) as total'))
                    ->where('users.province', '!=', null)
                    ->where('users.province', '!=', '-')
                    ->groupBy('users.province')
                    ->get();
                // $trackersTable = Tracker::where('province', '=', null)->get();
                // $pushProvinceEmpty = \DB::table('trackers')
                //     ->join('users', 'trackers.user_id', '=', 'users.id')
                //     ->select('users.province', \DB::raw('count(users.province) as total'))
                //     ->where('users.province', '=', null)
                //     ->groupBy('users.province')
                //     ->get();
                // return $pushProvinceEmpty;

                // $provinceEmpty = 0;
                // foreach ($trackers as $key => $tracker) {
                //     if ($tracker->province == null || $tracker->province == '-') {
                //         $provinceEmpty++;
                //     }
                // }
                // $trackerTables = Tracker::all();
                // foreach ($trackerTables as $key => $item) {
                //     if ($item->province == null || $item->province == '') {
                //         $provinceEmpty++;
                //     }
                // }
                // // return $provinceEmpty;

                $trackers['-'] = [
                    "province" => "-",
                    "total" => count(Tracker::where('province', '=', null)->get())
                ];

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully retrived',
                    'data' => [
                        'total' => count(Tracker::all()),
                        'data' => $trackers->values()
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

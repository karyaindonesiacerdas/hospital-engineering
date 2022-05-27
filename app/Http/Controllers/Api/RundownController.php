<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Rundown;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RundownController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except('index');
    }

    public function index()
    {
        try {
            $rundowns = Rundown::whereYear('created_at', now()->year)->get();
            if ($rundowns) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $rundowns,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $rundown = Rundown::create($request->all());
                if ($rundown) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully saved',
                        'data' => $rundown,
                    ], 200);
                }
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function show(Rundown $rundown)
    {
        try {
            if (auth()->user()->role == 'admin') {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $rundown,
                ], 200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Rundown $rundown)
    {
        try {
            if (auth()->user()->role == 'admin') {
                if ($rundown->update($request->all())) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully updated',
                        'data' => $rundown,
                    ], 200);
                }
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function destroy(Rundown $rundown)
    {
        try {
            if ($rundown->delete()) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully deleted',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function closingSeminarReward()
    {
        try {
            if (auth()->user()->role == 'visitor') {
                $rundown = Rundown::whereDate('created_at', Carbon::today())->where('is_end', 1)->where('status', 3)->first();
                if ($rundown) {
                    $checkAlreadyExist = Activity::where(['causer_id' => auth()->id(), 'subject_id' => $rundown->id, 'subject_type' => 'reward', 'subject_name' => "webinar-$rundown->id"])->first();
                    $rundown['isJoined'] = 0;
                    if ($checkAlreadyExist) {
                        $rundown['isJoined'] = 1;
                    }
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully fetched',
                        'data' => $rundown,
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'Data is Empty',
                    ], 400);
                }
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}

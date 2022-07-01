<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use App\Support\Collection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class ActivityController extends Controller
{
    public function activityList(Request $request)
    {
        try {
            $activities = Activity::with(array('causer' => function ($query) {
                $query->select('id', 'name', 'email', 'mobile');
            }))->where('subject_type', 'reward');


            if ($request->subject_type) {
                $activities->where('subject_type', $request->subject_type);
            }

            if (auth()->user()->role == 'visitor') {
                $activities->where('causer_id', auth()->id())
                    ->with(['subject' => function($query) {
                        $query->select('id', 'company_name');
                    }]);
            } else if (auth()->user()->role == 'admin') {
                $users = User::whereHas('activities')->get();
                $data = [];
                foreach ($users as $item) {
                    array_push($data, [
                        'id' => $item->id,
                        'name' => $item->name,
                        'email' => $item->email,
                        'total_reward' => count($item->activities),
                    ]);
                }
                $collection = (new Collection($data))->paginate($request->input('limit', 50));
                return $collection;

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Fetch succeed',
                    'data' => $activities->simplePaginate($request->input('limit', 50))->groupBy('causer_id'),
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Unauthorized',
                ], 400);
            }

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $activities->simplePaginate($request->input('limit', 50)),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fetch failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
    // activityStore

    public function activityStore(Request $request)
    {
        try {
            if (auth()->user()->role == 'visitor') {
                $rules = [
                    'subject_id' => 'required|string',
                    'subject_type' => 'required|string',
                    'subject_name' => 'required|string',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => $validator->errors(),
                    ], 400);
                }

                if (str_contains($request->subject_name, 'seminar-')) {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'Log Failed Recorded',
                        'data' => $request->all(),
                    ], 400);
                }

                $checkAlreadyExist = Activity::where(['causer_id' => auth()->id(), 'subject_id' => $request->subject_id, 'subject_type' => $request->subject_type, 'subject_name' => $request->subject_name])->whereDate('created_at', Carbon::today())->first();

                if (!$checkAlreadyExist) {
                    Activity::create(['causer_id' => auth()->id(), 'subject_id' => $request->subject_id, 'subject_type' => $request->subject_type, 'subject_name' => $request->subject_name]);
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Log recorded',
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'This record already exists, cannot be duplicated!',
                    ], 400);
                }
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Unauthorized',
                ], 400);
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

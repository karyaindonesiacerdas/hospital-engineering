<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function userBroadcast(Request $request)
    {
        $data = Broadcast::paginate(10);
        if ($data) {
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully fetched',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed',
                'data' => 'Error..',
            ], 400);
        }
    }

    public function adminStoreBroadcast(Request $request)
    {
        try {
            $data = auth()->user()->broadcasts()->create(['message' => $request->message]);
            if ($data) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Data failed',
                    'data' => 'Error..',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

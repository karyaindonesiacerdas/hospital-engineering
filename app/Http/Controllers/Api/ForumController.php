<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        try {
            $role = auth()->user()->role;
            $forum = Forum::with('user');
            if ($role == 'visitor') {
                $forum->where('status', true);
            }
            $forum = $forum->get();
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully fetched',
                'data' => $forum,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = auth()->user()->forums()->create(['message' => $request->message]);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rundown;
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
            $rundowns = Rundown::all();
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
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
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
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to fetch',
                'data' => $th->getMessage(),
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
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to update',
                'data' => $th->getMessage(),
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
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

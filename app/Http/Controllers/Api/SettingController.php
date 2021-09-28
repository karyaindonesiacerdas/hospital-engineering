<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        try {
            if (auth()->user()->role == 'admin') {
                $setting = Setting::first();
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $setting,
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
            $setting = Setting::create($request->all());
            if ($setting) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully stored',
                    'data' => $setting,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fail to proceed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Setting $setting)
    {
        try {
            if ($setting->update($request->all())) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully updated',
                    'data' => $setting,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fail to proceed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function destroy(Setting $setting)
    {
        try {
            if ($setting->delete()) {
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

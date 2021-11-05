<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function validationReferral($referral = '', Request $request)
    {
        try {
            $user = User::where('referral', $referral)->first();
            if ($user) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data found',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'success',
                    'message' => 'Data not found',
                    'data' => 'Data not found',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data not found',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

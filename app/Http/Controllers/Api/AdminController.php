<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getReferral(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $dataReferral = null;
                if ($request->keyword) {
                    $client = new \GuzzleHttp\Client();
                    $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . $request->keyword, ['http_errors' => false]);
                    $result = json_decode($requestApi->getBody());
                    $resCode = trim(collect($result->code), '[]');
                    if ($resCode == 200) {
                        $dataReferral = collect($result->data);
                        return $dataReferral;
                        // $referral_code = $dataReferral['referral_code'];
                    } else {
                        return response()->json([
                            'code' => 400,
                            'type' => 'danger',
                            'message' => 'Error, data failed to update',
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'Please input email or mobile',
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

    public function updateReferral(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $dataReferral = null;
                $users = User::whereNull('referral')->skip($request->input('skip', 0))->take($request->input('limit', 5))->get(['id', 'email', 'mobile']);
                foreach ($users as $item) {
                    $client = new \GuzzleHttp\Client();
                    $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . $item->email, ['http_errors' => false]);
                    $result = json_decode($requestApi->getBody());
                    return $result['code'];
                    $resCode = trim(collect($result->code), '[]');
                    if ($resCode == 200) {
                        $dataReferral = collect($result->data);
                        $referralCode = $dataReferral['referral_code'];
                        $item->update(['referral' => $referralCode]);
                    }
                }
                return 'ok';
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

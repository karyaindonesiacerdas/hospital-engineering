<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserReward;
use Illuminate\Http\Request;

class UserRewardController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (auth()->user()->role !== 'admin') {
                throw new \Exception('Access denied');
            }
            $counters = UserReward::select('*');
            if (($filter = $request->input('filter'))) {
                $counters->where(function ($query) use ($filter) {
                    $query->where('name', 'like', "%{$filter}%")
                        ->orWhere('email', 'like', "%{$filter}%")
                        ->orWhere('mobile', 'like', "%{$filter}%");
                });
            }
            if (($sortColumn = $request->input('sortColumn'))) {
                $sortDirection = $request->input('sortDirection') ?? 'ASC';
                if (in_array($sortColumn, ['name', 'email', 'mobile', 'rewards'])) {
                    $counters->orderBy($sortColumn, $sortDirection);
                } else {
                    $counters->orderBy('rewards', 'DESC');
                }
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully retrieved',
                'data' => $counters->paginate($request->input('limit', 50)),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function exhibitorList(Request $request)
    {
        try {
            $users = User::with('package')->where('role', 'exhibitor');
            if ($request->search) {
                $users->where('name', 'like', "%" . $request->search . "%");
            }
            if ($request->category) {
                $users->whereJsonContains('business_nature', $request->category);
            }
            if ($request->show_package == 1) {
                $users = $users->where('package_id', '!=', null)->orderByDesc('package_id');
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $users->get(['id', 'name', 'company_logo', 'company_name', 'business_nature', 'package_id']),
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

    public function exhibitorDetail(User $user)
    {
        try {
            if ($user->role == 'exhibitor') {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Fetch succeed',
                    'data' => collect(User::with('banners')->find($user->id))->except(['created_at', 'updated_at', 'email_verified_at', 'visit_purpose', 'product_interest', 'visitor_type', 'institution_type', 'institution_name']),
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fetch failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}

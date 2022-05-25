<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\CounterVisitor;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function exhibitorList(Request $request)
    {
        try {
            $users = User::with('package')->where('role', 'exhibitor')->whereYear('created_at', now()->year);
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
                'data' => $users->get(['id', 'name', 'company_logo', 'company_name', 'business_nature', 'package_id', 'ala_carte', 'company_order', 'published', 'position', 'role']),
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
            if (auth()->user()->role == 'visitor') {
                $checkAlreadyExist = Activity::where(['causer_id' => auth()->id(), 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'booth'])->first();

                if (!$checkAlreadyExist) {
                    Activity::create(['causer_id' => auth()->id(), 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'booth']);
                }
            }

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

    public function userList(Request $request)
    {
        try {
            $users = User::query();
            if ($request->status) {
                $users->where('status', $request->status);
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $users->paginate(7),
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

    public function detailByEmail(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user = collect($user)->only(['id', 'name', 'email', 'mobile', 'institution_name']);

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data retrieved successfully',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'User Visitor Not Registered',
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

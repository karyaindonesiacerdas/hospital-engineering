<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;

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
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Fetch succeed',
                'data' => $users->where('package_id', '!=', null)->orderByDesc('package_id')->get(['id', 'name', 'company_logo', 'company_name', 'business_nature', 'package_id']),
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

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'company_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $company_logo = $request->file('company_logo');
        if ($company_logo) {
            $input['imagename'] = time() . '.' . $company_logo->getClientOriginalExtension();
            $destinationPath = public_path('companies');
            $img = Image::make($company_logo->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            auth()->user()->update([
                'company_name' => $request->company_name,
                'company_logo' => $input['imagename'],
                'company_video_url' => $request->company_video_url,
                'company_web' => $request->company_web,
                'company_description' => $request->company_description,
            ]);
        } else {
            auth()->user()->update([
                'company_name' => $request->company_name,
                'company_video_url' => $request->company_video_url,
                'company_web' => $request->company_web,
                'company_description' => $request->company_description,
            ]);
        }
        return back();
    }

    public function company()
    {
        $user = auth()->user();
        return view('exhibitor.company.index', compact('user'));
    }

    public function guideline()
    {
        return view('exhibitor.guideline.index');
    }

    public function certificate()
    {
        return view('exhibitor.certificate.index');
    }
}

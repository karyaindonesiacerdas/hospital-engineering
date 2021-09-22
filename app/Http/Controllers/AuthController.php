<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['login', 'loginEmail', 'register']);
    }

    public function register(Request $request)
    {
        if ($request->role == 'visitor') {
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'job_function' => 'required',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'institution_name' => 'required',
                'institution_type' => 'required',
                'country' => 'required',
                'province' => 'required',
                'visitor_type' => 'required',
                'product_interest' => 'required',
                'visit_purpose' => 'required',
                'member_sehat_ri' => 'required',
                'allow_share_info' => 'required',
            ]);
        }

        if ($request->role == 'exhibitor') {
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'job_function' => 'required',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'company_name' => 'required',
                'company_website' => 'required',
                'country' => 'required',
                'province' => 'required',
                'business_nature' => 'required',
            ]);
        }

        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        if ($request->has('allow_share_info')) {
            $data['allow_share_info'] = $request->allow_share_info == 'true' ? true : false;
        }
        try {
            $user = User::create($data);
            if (!$token = auth()->login($user)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            } else {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Successful registration',
                    'data' => [
                        'user' => collect($user)->only(['id', 'name', 'email', 'role', 'mobile']),
                        'token_type' => 'bearer',
                        'token' => $token,
                    ],
                ], 200);
            }
            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Registration failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function login()
    {
        try {
            $credentials = request(['email', 'password']);
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            } else {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Successfully logged in',
                    'data' => [
                        'user' => collect(auth()->user())->only(['id', 'name', 'email', 'role', 'mobile']),
                        'token_type' => 'bearer',
                        'token' => $token,
                    ],
                ], 200);
            }
            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Login failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function loginEmail()
    {
        try {
            if ($user = User::where('email', request('email'))->first()) {
                if (!$token = auth()->login($user)) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Successfully logged in',
                    'data' => [
                        'user' => collect($user)->only(['id', 'name', 'email', 'role', 'mobile']),
                        'token_type' => 'bearer',
                        'token' => $token,
                    ],
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Login failed',
                    'data' => 'Error..',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Login failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function me()
    {
        try {
            if (auth()->user()) {
                if (auth()->user()->role == 'visitor') {
                    $user = collect(auth()->user())->except(['created_at', 'updated_at', 'email_verified_at', 'company_description', 'company_name', 'company_website', 'packages', 'business_nature', 'additional_remarks', 'company_logo']);
                }
                if (auth()->user()->role == 'exhibitor') {
                    $user = collect(auth()->user())->except(['created_at', 'updated_at', 'email_verified_at', 'visit_purpose', 'product_interest', 'visitor_type', 'institution_type', 'institution_name']);
                }
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
                    'message' => 'Data failed to retrieve',
                    'data' => 'Error..',
                ], 400);
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

    public function update(Request $request)
    {
        try {
            $requestData = $request->all();
            if ($request->password) {
                $request['password'] = bcrypt($request->password);
            }
            if ($request->hasFile('company_logo')) {
                $companyFileName = md5($request->file('company_logo') . microtime()) . '.' . $request->file('company_logo')->extension();
                $requestData['company_logo'] = $companyFileName;
                $request->file('company_logo')->storeAs('companies', $companyFileName);
            }
            if ($request->hasFile('img_profile')) {
                $profileFileName = md5($request->file('img_profile') . microtime()) . '.' . $request->file('img_profile')->extension();
                $requestData['img_profile'] = $profileFileName;
                $request->file('img_profile')->storeAs('profiles', $profileFileName);
            }

            if (auth()->user()->update($requestData)) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data updated successfully',
                    'data' => auth()->user(),
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Data failed to update',
                    'data' => 'Error..',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to update',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    // API =======================================

    public function registerVisitor()
    {
        $countries = Http::get('https://restcountries.eu/rest/v2/all')->json();
        $province = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')['provinsi'];
        return view('auth.register-visitor', compact('countries', 'province'));
    }

    public function registerGuest(Request $request)
    {
        $user = User::create($request->all());
        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            session(['name' => $user->name, 'email' => $user->email]);
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function registerExhibitor()
    {
        $countries = Http::get('https://restcountries.eu/rest/v2/all')->json();
        $province = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')['provinsi'];
        return view('auth.register-exhibitor', compact('countries', 'province'));
    }
}

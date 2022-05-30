<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendResetPasswordJob;
use App\Models\Activity;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['login', 'loginEmail', 'register', 'visitorDetail', 'loginEmailVisitor']);
    }

    public function register(Request $request)
    {
        if ($request->role == 'visitor') {
            $rules = [
                'email' => 'required|unique:users|string|email|max:255',
                'mobile' => 'required|numeric',
                'name' => 'required|string|max:255',
                'job_function' => 'nullable',
                // 'password' => ['required', 'min:5', 'confirmed', Rules\Password::defaults()],
                'password' => 'required|confirmed|min:5',
                'institution_name' => 'nullable',
                'institution_type' => 'nullable',
                'country' => 'nullable',
                'province' => 'nullable',
                'visitor_type' => 'nullable',
                'product_interest' => 'nullable',
                'visit_purpose' => 'nullable',
                'member_sehat_ri' => 'nullable',
                'allow_share_info' => 'nullable',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => $validator->errors(),
                ], 400);
            }
        }

        if ($request->role == 'exhibitor') {
            $rules = [
                'email' => 'required|unique:users|string|email|max:255',
                'mobile' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'job_function' => 'required',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'company_name' => 'required',
                'company_website' => 'required',
                'country' => 'required',
                'province' => 'required',
                'business_nature' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => $validator->errors(),
                ], 400);
            }
        }

        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        if ($request->has('allow_share_info')) {
            $data['allow_share_info'] = $request->allow_share_info == 'true' ? true : false;
        }
        try {
            $user = User::create($data);
            if ($user) {
                if ($user->role == 'visitor') {
                    $checkAlreadyExist = Activity::where(['causer_id' => $user->id, 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'register'])->first();

                    if (!$checkAlreadyExist) {
                        Activity::create(['causer_id' => $user->id, 'subject_id' => $user->id, 'subject_type' => 'reward', 'subject_name' => 'register']);
                    }
                }

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
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Registration Failed',
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

    public function login()
    {
        try {
            $credentials = request(['email', 'password']);
            if (!$token = auth()->attempt($credentials)) {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'You have entered an invalid username or password',
                ], 400);
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
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function loginEmail()
    {
        try {
            if ($user = User::where('email', request('email'))->first()) {
                if (!$token = auth()->login($user)) {
                    return response()->json(['error' => 'You have entered an invalid username or password'], 401);
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
                    'message' => 'You have entered an invalid username or password',
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

    public function resetEmail()
    {
        try {
            if ($user = User::where('email', request('email'))->first()) {
                $newPassword = \Str::random(10);
                $user->password = bcrypt($newPassword);
                $user->save();

                $mail_details = [
                    'subject' => 'Reset Password',
                    'password' => $newPassword,
                    'email' => $user->email,
                    'name' => $user->name,
                ];

                SendResetPasswordJob::dispatch($mail_details);

                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Successfully logged in',
                    'data' => 'New password sent to your email',
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'You have entered an invalid username or password',
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

    public function loginEmailVisitor()
    {
        try {
            if ($user = User::where('email', request('email'))->first()) {
                if ($user->role != 'visitor' || !auth()->login($user)) {
                    return response()->json(['error' => 'You have entered an invalid username or password'], 401);
                }
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Successfully logged in',
                    'data' => [
                        'user' => collect($user)->only(['id', 'name', 'email', 'role', 'mobile']),
                        'token_type' => 'bearer',
                        'token' => auth()->login($user),
                    ],
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'type' => 'danger',
                    'message' => 'Email Not Found!',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function me()
    {
        try {
            if (auth()->user()) {
                if (auth()->user()->role == 'admin') {
                    $user = collect(auth()->user())->only(['name', 'email', 'role']);
                }
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
                    'message' => 'Error, Data failed to retrieve',
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

    public function userDetail(User $user)
    {
        try {
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $user->only(['name', 'email', 'img_profile', 'institution_name', 'role', 'company_name', 'allow_share_info']),
            ], 200);
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Error, Data failed to retrieve',
            ], 400);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $requestData = $request->all();
            if ($request->password) {
                $requestData['password'] = bcrypt($request->password);
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
                if (auth()->user()->role == 'visitor') {
                    $checkAlreadyExist = Activity::where(['causer_id' => auth()->id(), 'subject_id' => auth()->id(), 'subject_type' => 'reward', 'subject_name' => 'update_profile'])->first();

                    if (!$checkAlreadyExist) {
                        Activity::create(['causer_id' => auth()->id(), 'subject_id' => auth()->id(), 'subject_type' => 'reward', 'subject_name' => 'update_profile']);
                    }
                }


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
                    'message' => 'Error, data failed to update',
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

    public function adminUpdateStatus(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $dataUpdate = [
                    'package_id' => $request->package_id,
                    'position' => $request->position,
                    'role' => $request->role,
                ];

                if (User::find($request->user_id)->update($dataUpdate)) {
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
                        'message' => 'Error, data failed to update',
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

    public function adminResetPassword(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                if (User::where('email', $request->email)->first()->update(['password' => bcrypt('secret12345678')])) {
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
                        'message' => 'Error, data failed to update',
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
}

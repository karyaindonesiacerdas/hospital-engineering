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

    // API =======================================
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
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
                    'message' => 'Data successfully fetched',
                    'data' => [
                        'token' => $token,
                        'token_type' => 'bearer',
                        'user' => $user
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

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function loginEmail()
    {
        if ($user = User::where('email', request('email'))->first()) {
            if (!$token = auth()->login($user)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        } else {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Login failed',
                'data' => 'Error..',
            ], 400);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try {
            if (auth()->user()) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => auth()->user(),
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Data failed',
                    'data' => 'Error..',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

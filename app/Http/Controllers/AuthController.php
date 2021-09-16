<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('jwt.verify')->except(['login', 'loginEmail']);
    // }

    // API =======================================
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

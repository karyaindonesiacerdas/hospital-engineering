<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
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

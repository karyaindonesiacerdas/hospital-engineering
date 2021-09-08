<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect(route('register.visitor'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
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

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

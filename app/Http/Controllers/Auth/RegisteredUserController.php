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

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        if (auth()->check()) {
            if (auth()->user()->role == 'visitor') {
                return redirect()->intended(route('main-hall'));
            }
            if (auth()->user()->role == 'exhibitor') {
                return redirect()->intended(route('maintenance'));
            }
            if (auth()->user()->role == 'admin') {
                return redirect()->intended(route('maintenance'));
            }
        } else {
            return back();
        }
        return back();
    }
}

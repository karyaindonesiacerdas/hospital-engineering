<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
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

            // $destinationPath = public_path('images');
            // $image->move($destinationPath, $input['imagename']);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
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

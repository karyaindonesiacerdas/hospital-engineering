<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function list()
    {
        try {
            if (auth()->user()->role == 'exhibitor') {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => auth()->user()->banners,
                ], 200);
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
        try {
            $checkAlreadyExists = auth()->user()->banners->where('order', $request->order)->first();
            if (!$checkAlreadyExists) {
                $name = md5($request->file('image') . microtime()) . '.' . $request->file('image')->extension();
                $request->file('image')->storeAs('banner', $name);
                $banner = auth()->user()->banners()->create([
                    'image' => $name,
                    'display_name' => $request->display_name,
                    'description' => $request->input('description', null),
                    'order' => $request->order
                ]);
                if ($banner) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully stored',
                        'data' => $banner,
                    ], 200);
                }
            } else {
                $name = md5($request->file('image') . microtime()) . '.' . $request->file('image')->extension();
                $request->file('image')->storeAs('banner', $name);
                $banner = auth()->user()->banners()->update([
                    'image' => $name,
                    'display_name' => $request->display_name,
                    'description' => $request->input('description', null),
                    'order' => $request->order
                ]);
                if ($banner) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully updated',
                        'data' => $banner,
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Fail to proceed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

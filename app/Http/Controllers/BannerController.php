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

    public function index()
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
                $name = null;
                if ($request->hasFile('image')) {
                    $name = md5($request->file('image') . microtime()) . '.' . $request->file('image')->extension();
                    $request->file('image')->storeAs('banner', $name);
                }
                $banner = auth()->user()->banners->where('order', $request->order)->first();
                $banner->update([
                    'image' => $name ? $name : $banner->image,
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

    public function show(Banner $banner)
    {
        //
    }

    public function update(Request $request, Banner $banner)
    {
        //
    }

    public function destroy(Banner $banner)
    {
        try {
            if ($banner->delete()) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully deleted',
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
}

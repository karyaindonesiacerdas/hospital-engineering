<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        try {
            $posts = Post::paginate(10);
            if ($posts) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $posts,
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
            if (auth()->user()->role == 'admin') {
                $nameFile = null;
                if ($request->hasFile('thumbnail')) {
                    $nameFile = md5($request->file('thumbnail') . microtime()) . '.' . $request->file('thumbnail')->extension();
                    $request->file('thumbnail')->storeAs('posts', $nameFile);
                }
                $post = auth()->user()->posts()->create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'body' => $request->body,
                    'thumbnail' => $nameFile,
                ]);
                if ($post) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully posted',
                        'data' => $post,
                    ], 200);
                }
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to post',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function show(Post $post)
    {
        try {
            if ($post) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $post,
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

    public function update(Request $request, Post $post)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $nameFile = null;
                if ($request->hasFile('thumbnail')) {
                    $nameFile = md5($request->file('thumbnail') . microtime()) . '.' . $request->file('thumbnail')->extension();
                    $request->file('thumbnail')->storeAs('posts', $nameFile);
                }
                $post = auth()->user()->posts()->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'body' => $request->body,
                    'thumbnail' => $nameFile,
                ]);
                if ($post) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Data successfully updated',
                        'data' => $post,
                    ], 200);
                }
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to post',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function destroy(Post $post)
    {
        try {
            if ($post->delete()) {
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

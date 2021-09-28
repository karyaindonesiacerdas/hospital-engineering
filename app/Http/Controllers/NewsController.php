<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->title);
        $request['publish'] = $request->has('publish') || 0;
        $news = News::create($request->all());
        if ($news) {
            return back();
        }
    }

    public function update(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->body = $request->body;
        $news->publish = $request->has('publish') || 0;
        $news->publish_at = $request->publish_at;
        if ($news->save()) {
            return redirect(route('news.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return back();
        }
    }
}

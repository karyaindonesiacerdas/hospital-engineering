<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::take(3)->get();
        return view('home', compact('news'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('home', compact('news'));
    }

    public function aboutHew()
    {
        # code...
    }

    public function aboutIahe()
    {
        # code...
    }

    public function faqGeneral()
    {
        # code...
    }
}

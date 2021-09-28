<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function setLang($locale = 'en')
    {
        App::setLocale($locale);
    }

    public function language(Request $request)
    {
        //
    }
}

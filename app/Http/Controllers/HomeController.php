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

    public function aboutHef()
    {
        return view('home.overview.about-hef');
    }

    public function news()
    {
        return view('home.overview.news');
    }

    public function importantDates()
    {
        return view('home.overview.important-dates');
    }

    // EXHIBITOR
    public function exhibitorGuideline()
    {
        return view('home.exhibitor.guideline');
    }

    public function whoExhibit()
    {
        return view('home.exhibitor.who-exhibit');
    }

    public function whyExhibit()
    {
        return view('home.exhibitor.why-exhibit');
    }

    public function packages()
    {
        return view('home.exhibitor.packages');
    }

    // VISITOR
    public function visitorGuideline()
    {
        return view('home.visitor.guideline');
    }

    public function whyAttend()
    {
        return view('home.visitor.why-attend');
    }

    public function whoAttend()
    {
        return view('home.visitor.who-attend');
    }

    public function aboutIahe()
    {
        return view('home.overview.about-iahe');
    }

    public function webinarRundown()
    {
        return view('home.overview.webinar-rundown');
    }

    public function faqGeneral()
    {
        return view('home.faq.general');
    }

    public function faqVisitor()
    {
        return view('home.faq.visitor');
    }

    public function faqExhibitor()
    {
        return view('home.faq.exhibitor');
    }
}

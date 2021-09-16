<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mainHall()
    {
        return view('visitor.main-hall.index');
    }

    public function liveSchedule()
    {
        return view('visitor.live-schedule.index');
    }

    public function consultation()
    {
        return view('visitor.consultation.index');
    }

    public function exhibitorList()
    {
        return view('visitor.exhibitor-list.index');
    }
}

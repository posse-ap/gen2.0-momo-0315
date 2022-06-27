<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudyRecord;
use App\Language;
use App\Content;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $study_records = StudyRecord::all();
        $todays_record = StudyRecord::whereDate('study_date', Carbon::today())->sum('study_time');
        $month_record = StudyRecord::whereYear('study_date', Carbon::today())->whereMonth('study_date', Carbon::today())->sum('study_time');
        $total_record = StudyRecord::sum('study_time');
        return view('auth.home', compact('study_records', 'todays_record', 'month_record', 'total_record'));
    }
}

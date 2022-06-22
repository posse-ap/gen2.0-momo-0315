<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\BigQuestion;
use App\Choice;

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
        $big_questions = BigQuestion::all();;
        $questions = Question::all();
        return view('auth.home', compact('big_questions', 'questions'));
    }
}

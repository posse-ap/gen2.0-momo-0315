<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BigQuestion;
use App\Question;
use App\Choice;

class QuizController extends Controller
{
    public function index()
    {
        $big_questions = BigQuestion::all();
        // dd($big_questions);
        return view('index', compact('big_questions'));
    }

    public function quiz($id) {
        $big_questions = BigQuestion::where('id', $id)->first();
        // dd($big_questions);
        $questions = Question::where('big_question_id', $id)->get();
        $choices = Choice::get();
        return view('quizy', compact('big_questions', 'questions', 'choices'));
    }
}

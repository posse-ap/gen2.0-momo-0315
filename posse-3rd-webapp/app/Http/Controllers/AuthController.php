<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BigQuestion;
use App\Question;
use App\Choice;

class AuthController extends Controller
{
    //クイズ自体の追加
    public function big_question_add()
    {
        $big_questions = BigQuestion::all();;
        return view('auth.big_question.add', compact('big_questions'));
    }

    public function big_question_data_add(Request $request)
    // フォームに入力されたデータをコントローラで受けることができる requestファザード httpリクエストの値を簡単に取れる
    {
        $data = $request->all();
        //とりまrequestall で送信された受け取ったデータ全部見れる
        //ddで$dateを確認することができる Dump and Die なにそれかっこいい データを全て分解して表示して(damp)、そこで一旦処理を止めますよ(die)
        // dd($data);
        // POSTされたデータをDB（memosテーブル）に挿入
        // MEMOモデルにDBへ保存する命令を出す

        //それぞれデータに入れてあげる

        $big_question_id = BigQuestion::insertGetId(['big_question_name' => $data['big_question_name']]);

        // リダイレクト処理
        //別のページに飛ばす処理,homeに飛ばす
        return redirect()->route('home');
    }

    //クイズごと削除（問題、選択肢も削除）
    public function big_question_delete($id)
    {
        $big_question = BigQuestion::where('id', $id)->first();
        // dd($big_questions);
        return view('auth.big_question.delete', compact('big_question'));
    }

    public function big_question_data_delete(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        $big_question = BigQuestion::where('id', $id);
        $big_question->delete();
        $questions = Question::where('big_question_id', $id);
        $questions->delete();
        $choices = Choice::where('big_question_id', $id);
        $choices->delete();

        return redirect()->route('home');
    }

    //問題追加
    public function question_add($big_question_id)
    {
        $big_question = BigQuestion::where('id', $big_question_id)->first();
        $questions = Question::where('big_question_id', $big_question_id)->first();
        $choices = Choice::where('big_question_id', $big_question_id)->first();
        return view('auth.edit.add', compact('big_question', 'questions', 'choices'));
    }

    public function question_data_add(Request $request, $big_question_id)
    {
        $inputs = $request->all();
        $latest_choice = Choice::where('big_question_id', $big_question_id)->orderBy('question_id', 'asc')->first();
        if($latest_choice == null) {
            $question_id = 1;
        } else {
            $question_id = $latest_choice['question_id'] + 1;
        }
        // dd($inputs['0']);
        Question::insertGetId(['big_question_id' => $big_question_id,  'question_id' => $question_id, 'img' => $inputs['img_file']]);
        Choice::insertGetId(['big_question_id' => $big_question_id, 'question_id' => $question_id, "choice_name" => $inputs['0'], 'option_number' => 0]);
        Choice::insertGetId(['big_question_id' => $big_question_id, 'question_id' => $question_id, "choice_name" => $inputs['1'], 'option_number' => 1]);
        Choice::insertGetId(['big_question_id' => $big_question_id, 'question_id' => $question_id, "choice_name" => $inputs['2'], 'option_number' => 2]);
        return redirect()->route('home');
    }

    //問題削除
    public function question_delete($big_question_id, $question_id)
    {
        $big_question = BigQuestion::where('id', $big_question_id)->first();
        $question = Question::where('big_question_id', $big_question_id)->where('question_id', $question_id)->first();
        // dd($question);
        $choices = Choice::where('big_question_id', $big_question_id)->where('question_id', $question_id)->get();
        return view('auth.edit.delete', compact('big_question', 'question', 'choices'));
    }

    public function question_data_delete(Request $request, $big_question_id, $question_id)
    {
        $questions = Question::where('big_question_id', $big_question_id)->where('question_id', $question_id);
        $questions->delete();
        $choices = Choice::where('question_id', $question_id);
        $choices->delete();
        return redirect()->route('home');
    }

    //問題編集
    public function question_edit($big_question_id, $question_id)
    {
        $big_question = BigQuestion::where('id', $big_question_id)->first();
        $question = Question::where('big_question_id', $big_question_id)->where('question_id', $question_id)->first();
        // dd($question);
        $choices = Choice::where('big_question_id', $big_question_id)->where('question_id', $question_id)->get();
        return view('auth.edit.edit', compact('big_question', 'question', 'choices'));
    }

    public function question_data_edit(Request $request, $big_question_id, $question_id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Choice::where('big_question_id', $big_question_id)->where('question_id', $question_id)->where('option_number', 0)->update(['big_question_id' => $big_question_id, 'question_id' => $question_id, 'choice_name' => $inputs[0], 'option_number' => 0]);
        Choice::where('big_question_id', $big_question_id)->where('question_id', $question_id)->where('option_number', 1)->update(['big_question_id' => $big_question_id, 'question_id' => $question_id, 'choice_name' => $inputs[1], 'option_number' => 1]);
        Choice::where('big_question_id', $big_question_id)->where('question_id', $question_id)->where('option_number', 2)->update(['big_question_id' => $big_question_id, 'question_id' => $question_id, 'choice_name' => $inputs[2], 'option_number' => 2]);
        return redirect()->route('home');
    }

    //クイズタイトルの編集
    public function title_edit($big_question_id)
    {
        $big_question = BigQuestion::where('id', $big_question_id)->first();
        return view('auth.edit.title', compact('big_question'));
    }

    public function title_data_edit(Request $request, $big_question_id)
    {
        $inputs = $request->all();
        BigQuestion::where('id', $big_question_id)->update(['big_question_name' => $inputs['title_name']]);
        return redirect()->route('home');
    }
}

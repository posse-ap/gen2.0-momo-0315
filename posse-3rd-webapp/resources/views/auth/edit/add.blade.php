@extends('layouts.app')

@section('content')
<div>{{ $big_question['id'] }}. {{ $big_question['big_question_name'] }}の難読地名クイズ</div>

<div>問題を追加</div>

<form action="/question_data_add/{{ $big_question['id'] }}" method="POST">
    @csrf
    <p>選択肢を作成</p>
    <p>正解の選択肢を一番上にご入力ください。</p>


    <div><input type="text" name="0"></div>
    <div><input type="text" name="1"></div>
    <div><input type="text" name="2"></div>

    <input type="hidden" value="{{ $big_question['id'] }}" name="big_question_id">

    <p>画像を挿入</p>
    <input type="file" name="img_file" valu="ファイルを選択">
    <input type="submit" value="問題を追加">

</form>


@endsection
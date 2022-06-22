<!-- 問題削除画面 -->
@extends('layouts.app')

@section('content')

<div>
    <div>{{ $big_question['id'] }}. {{ $big_question['big_question_name'] }}の難読地名クイズ：{{ $question['question_id'] }}問目 </div>
    <img src="/img/{{ $question['img'] }}">

</div>

<div>この問題を削除しますか？</div>
<form action="/question_data_delete/{{ $big_question['id'] }}/{{ $question['question_id'] }}" method="POST">
    @csrf
    @foreach($choices as $choice)
    <div>{{ $choice['choice_name'] }}</div>
    @endforeach
    <input type="submit" value="削除する">
</form>
<a href="/home">キャンセル</a>
@endsection
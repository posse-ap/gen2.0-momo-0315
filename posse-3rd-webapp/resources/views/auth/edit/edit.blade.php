<!-- 問題編集画面 -->
@extends('layouts.app')

@section('content')

<div>
    <div>{{ $big_question['id'] }}. {{ $big_question['big_question_name'] }}の難読地名クイズ：{{ $question['question_id'] }}問目 </div>
    <img src="/img/{{ $question['img'] }}">

</div>

<form action="/question_data_edit/{{ $big_question['id'] }}/{{ $question['question_id'] }}" method="POST">
    @csrf
    <span>一番上が正解の選択肢です</span>
    @foreach($choices as $choice)
    <div>
        <input type="text" value="{{ $choice['choice_name'] }}" name="{{ $loop->index }}">
    </div>
    @endforeach
    <input type="submit" value="編集">
</form>
@endsection
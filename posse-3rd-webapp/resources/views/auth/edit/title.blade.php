<!-- タイトル編集画面 -->
@extends('layouts.app')

@section('content')
<div>クイズタイトルを編集</div>
<form action="/title_data_edit/{{ $big_question['id'] }}" method="POST">
    @csrf
    <input type="text" value="{{ $big_question['big_question_name']}}" name="title_name">
    <input type="submit" value="編集">
</form>
@endsection
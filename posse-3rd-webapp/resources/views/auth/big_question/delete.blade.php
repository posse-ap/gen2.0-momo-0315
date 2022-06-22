@extends('layouts.app')

@section('content')
<div>本当にこのクイズを削除しますか？</div>

<form action="/big_question_data_delete/{{ $big_question['id'] }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $big_question['id'] }}">
    <input type="submit" value="削除">
</form>
<a href="/home">キャンセル</a>



@endsection
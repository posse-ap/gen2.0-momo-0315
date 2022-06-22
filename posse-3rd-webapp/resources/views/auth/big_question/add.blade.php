@extends('layouts.app')

@section('content')
<div class="">
<div>現在のクイズ一覧</div>

@foreach($big_questions as $big_question)

<div>{{ $big_question['id'] }}. {{ $big_question['big_question_name'] }}の難読地名クイズ</div>

@endforeach

<div>新たなクイズを追加</div>
<form action="/big_question_data_add" method="POST">
@csrf
    <input type="text" name="big_question_name"><span>の難読地名クイズ</span>
    <input type="submit" value="追加">

</form>
</div>

@endsection
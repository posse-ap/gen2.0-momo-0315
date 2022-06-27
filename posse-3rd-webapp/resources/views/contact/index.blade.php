@extends('layouts.auth')
@section('content')
@if ( Session::has('sent'))
<div>
    <p>{{old('name')}}さん、{{ session('sent') }}</p>
</div>
@endif

<form action="{{ url('contact2') }}" method="POST">
    @csrf

    <p>名前：<input type="text" name="name"></p>
    <p>メールアドレス：<input type="text" name="e_mail"></p>

    <input type="submit" value="送信">
</form>
@endsection
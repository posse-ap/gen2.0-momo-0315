<!-- 管理者ログインホーム画面 -->
@extends('layouts.app')

@section('content')
<div class="login-status">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">ログイン状態</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    ログイン中
                </div>
            </div>
        </div>
    </div>
</div>
<div>webapp topページ</div>

@endsection
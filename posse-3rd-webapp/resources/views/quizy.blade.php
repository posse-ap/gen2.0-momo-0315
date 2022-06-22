@extends('layouts.header')
@section('head')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ガチで{{ $big_questions['big_question_name'] }}の人しか解けない！＃{{ $big_questions['big_question_name'] }}の難読地名クイズ</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quizy.css') }}">
</head>

<body>

    @endsection
    <!-- headerがここに入る -->
    @section('quiz')

    <!-- クイズを表示してる部分 -->
    <div class="container content-wrapper">
        <div class="clearfix header-spacer"></div>
        <link rel="stylesheet" href="index.css">
        <h1>ガチで{{ $big_questions['big_question_name'] }}の人しか解けない！＃{{ $big_questions['big_question_name'] }}の難読地名クイズ</h1>

        <img class="img_K" src="https://pbs.twimg.com/profile_images/1352968042024562688/doQgizBj_400x400.jpg" alt="">

        <a class="tokyo" href="https://kuizy.net/tag/tokyo">東京</a>


        <p class="view_rate">ビュー数271573　平均正答率81.2%　全問正解率18.9%</p>
        <p class="view_rate" id="answer_rate">正答率などの反映は少し遅れることがあります。</p>

        <div id="question_area">

            @foreach($questions as $question)
            <h2>{{ $loop -> index + 1 }}. この地名はなんて読む？</h2>
            <img src="/img/{{ $question['img'] }}">

            <ul id="answerLists_{{ $question['id'] }}">
                @foreach ($choices->where('big_question_id', $question['big_question_id'])->where('question_id', $question['question_id']) as $choice)
                
                <li id="answerList_{{ $question['id'] }}_{{ $choice['option_number'] }}" onclick="check({{ $question['id'] }}, {{ $choice['option_number'] }}, 0)">
                    {{ $choice['choice_name'] }}
                </li>
                @endforeach
            </ul>
            <div class="answerBox" id="answerBox_{{ $question['id'] }}_0">
                <p class="rightWrong right">正解</p>
                <p class="description">正解は「{{ $choices->where('big_question_id', $big_questions->id)->where('question_id', $question->question_id)->where('answernumber', 0 )->first()->choice_name }}」です！</p>
            </div>
            <div class="answerBox" id="answerBox_{{ $question['id'] }}">
                <p class="rightWrong wrong">不正解</p>
                <p class="description">正解は「{{ $choices->where('big_question_id', $big_questions->id)->where('question_id', $question->question_id)->where('answernumber', 0 )->first()->choice_name }}」です！</p>
            </div>

            @endforeach
        </div>
    </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
@endsection
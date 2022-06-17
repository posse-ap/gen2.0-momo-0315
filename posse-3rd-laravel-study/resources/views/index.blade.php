<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../public/favicon.ico" id="favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <title>quizy</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="whole_wrapper">
        <a href="" class="quiz_link"><span>管理者画面</span></a>
        @foreach($big_questions as $big_question)

        <a href="/quiz/{{ $big_question['id'] }}" class="quiz_link">
            <span>
                {{ $big_question['id'] }}. {{ $big_question['big_question_name'] }}の難読地名クイズ
            </span>
        </a>

        @endforeach
    </div>

</body>

</html>
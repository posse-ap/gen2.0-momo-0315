<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function tokyo() {
        return <<<EOF
<html>
<head>
<tittle>hello</tittle>
<style>
body {font-size:16pt; color:#999; }
h1 {font-size:100pt; color:#eee; }
</style>
</head>
<body>
<h1>東京</h1>
<p>quiz/1 tokyo</p>
</body>
</html>

EOF;
}

public function hiroshima() {
    return <<<EOF
<html>
<head>
<tittle>hello</tittle>
<style>
body {font-size:16pt; color:#999; }
h1 {font-size:100pt; color:#eee; }
</style>
</head>
<body>
<h1>広島</h1>
<p>quiz/2 hiroshima</p>
</body>
</html>

EOF;
}
}
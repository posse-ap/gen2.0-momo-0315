<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
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
<h1>hello</h1>
<p>hellloコントローラだよん</p>
</body>
</html>

EOF;
    }
}

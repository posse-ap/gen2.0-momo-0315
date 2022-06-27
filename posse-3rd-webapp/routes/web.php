<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'IndexController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/testmail', function(){
    Mail::to('test@example.com')->send(new TestMail);
    return 'パスワードリセット確認のメールを送信しました';
});


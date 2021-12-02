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

Route::get('/', 'IndexController@index');
Route::get('/quiz/{id}', 'QuizController@index')->name('quiz.id');
Route::get('/admin/login', 'AdminController@loginIndex');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/edit/{id}', 'AdminController@editIndex');
Route::post('/admin/edit/{id}', 'AdminController@edit');

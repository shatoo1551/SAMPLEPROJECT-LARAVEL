<?php

use Illuminate\Support\Facades\Route;

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
//ホーム画面を表示
Route::get('/',  "NewsController@index" )-> name ('newsdata');
//詳細画面を表示
Route::get('sampleproject/public/detail/{id}',  "NewsController@showDetail" )-> name ('detail');
//ニュース登録画面を表示
Route::get('/news/create', 'NewsController@showCreate')-> name ('create');
//ニュース登録
Route::post('/news/store', 'NewsController@exeStore')-> name ('store');
//コメント登録
Route::post('/news/comment/{id}', 'NewsController@exeComments')-> name ('comment');
//ニュース削除
Route::get('/delete/{id}',  'NewsController@exeDelete' )-> name ('delete');
//コメント削除
Route::get('/news/deletecomment/',  'NewsController@exeDeleteComment')-> name ('deletecomment');

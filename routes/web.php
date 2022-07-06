<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\InfoController;

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

//会員登録画面表示
Route::get('/register',function(){
  return view('register');
});

//会員登録
Route::post('/register',[ RegisterController::class,'register']);

//ログイン画面表示
Route::get('/login',[LoginController::class,'login_view']);

//ログイン画面または再生画面表示
Route::get('/',[LoginController::class,'login']);
Route::post('/',[LoginController::class,'index_view']);

//楽曲追加画面表示
Route::get('/upload',[UploadController::class,'add']);

//楽曲追加
Route::post('/upload',[UploadController::class,'create']);

Route::get('/phpinfo',[InfoController::class, 'show']);
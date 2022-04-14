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

Route::get('/', function(){
    return view('index');
})-> name('index');

Route::post('/searchresult', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/post', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);

// Route::get('/post/like', [App\Http\Controllers\PostsController::class, 'like']);
Route::post('/user/follow', [App\Http\Controllers\UsersController::class, 'follow']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

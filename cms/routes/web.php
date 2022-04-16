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

// 検索に関するルーティング
Route::post('/searchresult', [App\Http\Controllers\SearchController::class, 'normal']);
Route::get('/tagsearch/{id}', [App\Http\Controllers\SearchController::class, 'tag']);



// POSTに関するルーティング
Route::get('/post/{id}', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/post', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);

// Route::get('/post/like', [App\Http\Controllers\PostsController::class, 'like']);

// Userに関するルーティング

Route::get('/user/{id}', [App\Http\Controllers\UsersController::class, 'show']);
Route::post('/user/follow', [App\Http\Controllers\UsersController::class, 'follow']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

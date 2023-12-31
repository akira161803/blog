<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\BlogController;

//ブログ一覧画面を表示
Route::get('/', [BlogController::class, 'showList'])->name('blogs');


//ブログ登録画面を表示
Route::get('/blog/create', [BlogController::class, 'showCreate'])->name('create');


//ブログ登録
Route::post('/blog/store', [BlogController::class, 'exeStore'])->name('store');


//ブログ詳細画面を表示
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');

//ブログ編集画面を表示
Route::get('/blog/edit/{id}', [BlogController::class, 'showEdit'])->name('edit');

//ブログ更新
Route::post('/blog/update', [BlogController::class, 'exeUpdate'])->name('update');

//ブログ削除
Route::post('/blog/delete/{id}', [BlogController::class, 'exeDelete'])->name('delete');


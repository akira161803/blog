<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\NiceController;


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [postController::class, 'index'])->name('top');

Route::view('/terms', 'parts.terms')->name('terms');

Route::post('/posts/store', [postController::class, 'store'])->name('store');

Route::get('/posts/filter', [postController::class, 'filter'])->name('filter');

Route::middleware(['auth'])->group(function ()
{
    Route::post('/posts/{post}/nice', [NiceController::class, 'nice'])->name('nice');
    Route::post('/posts/{post}/unnice', [NiceController::class, 'unnice'])->name('unnice');

    Route::get('/myPage/create', [postController::class, 'myPageCreate'])->name('myPageCreate');

    Route::post('/myPage/store', [postController::class, 'myPageStore'])->name('myPageStore');

    Route::get('/myPage/myIndex', [postController::class, 'myPageMyIndex'])->name('myPageMyIndex');

    Route::get('/myPage/myPageMyIndexFilter', [postController::class, 'myPageMyIndexFilter'])->name('myPageMyIndexFilter');

    Route::get('/myPage/allIndex', [postController::class, 'myPageAllIndex'])->name('myPageAllIndex');

    Route::get('/myPage/AllIndexFilter', [postController::class, 'myPageAllIndexFilter'])->name('myPageAllIndexFilter');

    Route::post('/myPage/delete/{id}', [postController::class, 'myPageDelete'])->name('myPageDelete');
    
    Route::get('/myPage/niceposts', [postController::class, 'myPageNiceposts'])->name('myPageNiceposts');

    Route::get('/myPage/nicepostsFilter', [postController::class, 'myPageNicepostsFilter'])->name('myPageNicepostsFilter');

});
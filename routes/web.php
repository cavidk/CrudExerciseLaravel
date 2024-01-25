<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', function () {
        return view('profile');
    });
});

Route::prefix('/posts')->group(function () {
    Route::get('/trash', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::put('/{id}/update-status', [PostController::class, 'updateStatus'])->name('posts.updateStatus');
    Route::delete('/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
});

Route::resource('posts', PostController::class);

Route::get('/unavailable', function () {
    return view('unavailable');
})->name('unavailable');

Route::get('contact', function () {
    return view('contact');
});



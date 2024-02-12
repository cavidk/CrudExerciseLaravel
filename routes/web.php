<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/posts')->group(function () {
    Route::get('/trash', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::put('/{id}/update-status', [PostController::class, 'updateStatus'])->name('posts.updateStatus');
    Route::delete('/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
});

Route::resource('posts', PostController::class);

    //create a route for user-data
Route::get('user-data', function () {
    //return the authenticated user
    return Auth::user();
});


Route::get('/unavailable', function () {
    return view('unavailable');
})->name('unavailable');

Route::get('contact', function () {

    $posts = Post::all();
    return view('contact', compact('posts'));
});

//create a root for send-mail
Route::get('send-mail', function () {
    Mail::send(new OrderShipped());
    dd('Mail Send Successfully');

});


require __DIR__ . '/auth.php';

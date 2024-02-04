<?php

use App\Http\Controllers\PostController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Http\Request;
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

    $posts = Post::all();
    return view('contact', compact('posts'));
});

//create a root for send-mail
Route::get('send-mail', function () {
    /*Mail::raw('Hello World', function($message){
        $message->to('test@testgmail.com')->subject('noreply');
});
    dd('Mail Send Successfully');*/
    Mail::send(new OrderShipped());
    dd('Mail Send Successfully');

});


//session routes

Route::get('get-session', function (Request $request) {

//    return cache()->get('name');
    //$data = $request->session()->all();

    //get token
    $data = $request->session()->all();

    dd($data);
});


Route::get('save-session', function (Request $request) {
   /* $request->session()->put('name', 'John Doe');
    $request->session()->put('email', 'johndoe@gmail.com');
    return redirect('get-session');*/

    //request session as an array
    $request->session()->put(['user_status' => 'logged_in']);

    return redirect('get-session');


/*    same cache
    cache()->put('name', 'John Doe', 60);
    cache()->put('email', 'johndoe@gmail.com');
    return redirect('get-session');*/
});

//Route::get('show-session-data', function(){
//    dd(session()->all());
//});



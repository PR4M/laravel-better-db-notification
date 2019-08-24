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

use App\App\Notifications\Models\DatabaseNotification;
use App\User;
use App\Comment;
use App\Notifications\Comments\CommentCreated;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notification', function() {
    //$notification = DatabaseNotification::find('220cdc74-f4b1-46b5-b384-beb8b2e0f16c');
    //dd($notification->models);
    $user = User::find(1);
    $comment = Comment::withTrashed()->find(1);

    $user->notify(new CommentCreated($comment));
});

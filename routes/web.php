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

use App\User;
use App\Posts;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_post/{id}', function($id) {
   $user = User::findOrFail($id);

   $post = Posts::create(['title'=>'New Post', 'body'=>'New body']);

   $user->$post()->save();
});
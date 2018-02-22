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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_post/{id}', function($id) {
   $user = User::findOrFail($id);

   //$post = Posts::create(['title'=>'New Post', 'body'=>'New body']);

   if($user->posts()->save(new Posts(['title'=>'New title', 'body'=>'New body']))){
       return 'A new post has been inserted!!!';
   } else {
       return 'There was an error while inserting a new post';
   }


});

Route::get('/read/{id}', function ($id){
   $user = User::findOrFail($id);

   //dd function gives us description of the objects that we are returning or using it with this function
   //it just return the type and all the description of the object

    //return dd($user->posts);

    echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<h2>User: ".$user->name."</h2>";
    foreach ($user->posts as $post){
                echo "<div class='col-lg-12 col-sm-12'>";
                    echo "<p>".$post->title."</p>";
                echo "</div>";
    }
        echo "</div>";
    echo "</div>";

});

Route::get('/update/{id}/{id2}', function ($id, $id2){
   $user = User::find($id);

   $update = $user->posts()->whereId($id2)->update(['title'=>'I love Laravel', 'body'=>'Laravel is the most awesome framework']);

   if($update){
       return 'Updating post '.$id2.' with user '.$user->name.' been successful';
   } else {
       return 'Error while updating';
   }

});

Route::get('/delete/{id}/{id2}', function($id, $id2){
    $user = User::find($id);

    $delete = $user->posts()->whereId($id2)->delete();

    if($delete){
        return 'Deleting post '.$id2.' from user '.$user->name.' has been successful';
    } else {
        return 'Error while deleting a post';
    }
});
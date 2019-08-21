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

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/', function () {
    return view('pages/homepage');
});

Route::post('postAdded', function(){
    $postId = request('postId');
    $postName = request('name');
    $postTitle = request('title');
    $postMessage = request('message');

    $createPostError = checkPostForm($postName, $postTitle, $postMessage);
    if(!empty($error)) {
        // Add query to database
    }

    $post = addPost($postName, $postTitle, $postMessage);
    if($post) {
        return redirect('/');
    } else {
        print("Error: Your post couldn't be added.");
    }
});
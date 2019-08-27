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
    $userPosts = getPosts();
    return view('layouts/master');
});

Route::get('/', function () {
    $sql = "select * from post";
    $posts = DB::select($sql);
    return view('pages.homepage')->with('posts', $posts);
});

Route::post('postAdded', function() {
    $postName = request('postName');
    $postTitle = request('postTitle');
    $postMessage = request('postMessage');
    $postDate = date('Y-m-d H:i:s');
    $postId = add_post($postName,$postTitle,$postMessage, $postDate);
});

function add_post($postName, $postTitle, $postMessage, $postDate) {
    $query = "INSERT into Post (postName, postTitle, postMessage, postCreated) VALUES (?, ?, ?, ?)";
    DB::insert($query,array($postName, $postTitle, $postMessage, $postDate));
    $postId = DB::getPdo()->lastInsertId();
    return $postId;
}
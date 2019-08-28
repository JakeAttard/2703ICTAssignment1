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
    $sql = "select * from post order by postId DESC";
    $posts = DB::select($sql);
    return view('pages.homepage')->with('posts', $posts);
});

Route::post('postAdded', function() {
    $postName = request('postName');
    $postTitle = request('postTitle');
    $postMessage = request('postMessage');
    date_default_timezone_set('Australia/Brisbane');
    $postDate = date('d-m-Y H:i:s');
    $postId = addPost($postName,$postTitle,$postMessage, $postDate);
});

function addPost($postName, $postTitle, $postMessage, $postDate) {
    $query = "INSERT into Post(postName, postTitle, postMessage, postCreated) VALUES (?, ?, ?, ?)";
    DB::insert($query,array($postName, $postTitle, $postMessage, $postDate));
    $postId = DB::getPdo()->lastInsertId();
    return $postId;
}

Route::get('postDetail/{postId}', function($postId) {
    $post = getPostDetail($postId);
    return view('pages.postDetail')->with('post', $post);
    //dd($item);
    //dd($id);
});

function getPostDetail($postId) {
    $sql = "select * from post where postId=?";
    $posts = DB::select($sql, array($postId));
    if (count($posts) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $post = $posts[0];
    return $post;
}
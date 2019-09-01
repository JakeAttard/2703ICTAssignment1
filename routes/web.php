<?php
    include "webfunctions.php";
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
    $comments = getComments();
    return view('pages.homepage')->with('posts', $posts)->with('comments', $comments);
});

Route::post('postAdded', function() {
    $postName = request('postName');
    $postTitle = request('postTitle');
    $postMessage = request('postMessage');
    date_default_timezone_set('Australia/Brisbane');
    $postDate = date('d-m-Y H:i:s');
    $postId = addPost($postName,$postTitle,$postMessage, $postDate);
    return redirect('/');
});

Route::get('postDetail/{postId}', function($postId) {
    $post = getPostDetail($postId);
    $comments = getComments($postId);
    return view('pages.postDetail')->with('post', $post)->withComments($comments);
});

Route::get('updatePost/{postId}', function($postId) {
    $post = getPostDetail($postId);
    return view("pages.updatePost")->with('post', $post);
});

Route::post('updatePost', function() {
    $postId = request('postId');
    $postTitle = request('postTitle');
    $postMessage = request('postMessage');
    updatePost($postId, $postTitle, $postMessage);
    return redirect(url("postDetail/$postId"));
});

Route::get('deletePost/{postId}', function($postId) {
    deleteComment($postId);
    deletePost($postId);
    return redirect(url("/"));
});

// Recent Posts
Route::get('recentPosts', function () {
    $sql = "select * from post order by postId DESC";
    $posts = DB::select($sql);
    $comments = getComments();
    return view('pages.recentPosts')->with('posts', $posts)->with('comments', $comments);
});

Route::get('viewComment/{postId}', function($postId){
    $post = getPostDetail($postId);
    $comments = getCommentsByid($postId);
    $commentName = "";
    $commentMessage = "";
    return view('pages.viewComment')->withPost($post)->withComments($comments)->withName($commentName)->withMessage($commentMessage);
});

Route::post('commentAdded', function(){
    $postId = request('postId');
    $commentName = request('commentName');
    $commentMessage = request('commentMessage');
    addComment($postId, $commentName, $commentMessage);
    $post = getPostDetail($postId);
    $comments = getCommentsByid($postId);
    $commentName = "";
    $commentMessage = "";
    return view('pages.viewComment')->withPost($post)->withComments($comments)->withName($commentName)->withMessage($commentMessage);
});

// Delete comment
Route::get('deleteComment/{commentId}', function($commentId){
    $postId = getPostbyCommentid($commentId);
    deleteComment($commentId);
    $post = getPostDetail($postId);
    $comments = getCommentsByid($postId);
    $name = "";
    $message = "";
    return view('pages.viewComment')->withPost($post)->withComments($comments)->withName($name)->withMessage($message);
});

// Users Page
Route::get('listUsers', function() {
    $sql = "select distinct postName from post";
    $postNames = DB::select($sql);
    return view('pages.listUsers')->with('postNames', $postNames);
});

function getUsers() {
    $sql = "select distinct(postName) from post";
    $users = DB::select($sql);
    return $users;
}

Route::get('userProfile/{postName}', function($postName) {
    $users = getUsers();
    $userPosts = getUserPosts($postName);
    return view('pages.userProfile')->with('users', $users)->with('postName', $postName)->with('posts', $userPosts);
});

function getUserPosts($postName) {
    $sql = "select * from post where postName = ? order by postId desc";
    $posts = DB::select($sql, array($postName));
    return $posts;
}

// Documentation Page
Route::get('documentation', function() {
    return view('pages.documentation');
});

// ER Diagram
Route::get('erdiagram', function() {
    return view('pages.erdiagram');
});
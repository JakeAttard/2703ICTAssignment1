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
});

function addPost($postName, $postTitle, $postMessage, $postDate) {
    $query = "INSERT into Post(postName, postTitle, postMessage, postCreated) VALUES (?, ?, ?, ?)";
    DB::insert($query,array($postName, $postTitle, $postMessage, $postDate));
    $postId = DB::getPdo()->lastInsertId();
    return $postId;
}

Route::get('postDetail/{postId}', function($postId) {
    $post = getPostDetail($postId);
    $comments = getComments($postId);
    return view('pages.postDetail')->with('post', $post)->withComments($comments);
});

function getPostDetail($postId) {
    $sql = "select * from post where postId=?";
    $posts = DB::select($sql, array($postId));
    if (count($posts) != 1){
        die("Error, please go back. : $sql");
    }
    $post = $posts[0];
    return $post;
}

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

function updatePost($postId, $postTitle, $postMessage) {
    $sql = "update post set postTitle = ?, postMessage = ? where postId = ?";
    DB::update($sql, array($postTitle, $postMessage, $postId));
}

Route::get('deletePost/{postId}', function($postId) {
    deletePost($postId);
    return redirect(url("/"));
});

function deletePost($postId) {
    $sql = "delete from post where postId = ?";
    DB::delete($sql, array($postId));
}

// Comments

// Get all the updated comments
function getComments() {
    $sql = "select post.postId, count(comment.commentPostId) as counter from post left join comment on post.postId = comment.commentPostId group by post.postId order by post.postId desc;";    // use left join
    $comments = DB::select($sql);
    return $comments;
}
    
// Get Comments by the posts id 
function getCommentsByid($postId) {
    $sql = "select * from comment where comment.commentPostId = ?;";
    $comments = DB::select($sql, array($postId));
    return $comments;
}

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

// Add comment to the current post
function addComment($postId, $commentName, $commentMessage) {
    $sql = "INSERT into comment (commentPostId, commentName, commentMessage) VALUES (?, ?, ?);";
    DB::insert($sql, array($postId, $commentName, $commentMessage));
    $commentId = DB::getPdo()->lastInsertId();
    return $commentId;
}
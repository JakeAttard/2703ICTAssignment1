<?php

// AddPost Function
// Passing through the postName, postTitle, postMessage and postDate properties
// Inserting the data into the Post values
function addPost($postName, $postTitle, $postMessage, $postDate) {
    $query = "INSERT into Post(postName, postTitle, postMessage, postCreated) VALUES (?, ?, ?, ?)";
    DB::insert($query,array($postName, $postTitle, $postMessage, $postDate));
    $postId = DB::getPdo()->lastInsertId();
    return $postId;
}

// getPostDetail function
function getPostDetail($postId) {
    $sql = "select * from post where postId=?";
    $posts = DB::select($sql, array($postId));
    if (count($posts) != 1){
        die("Error, please go back. : $sql");
    }
    $post = $posts[0];
    return $post;
}

// updatePost function
function updatePost($postId, $postTitle, $postMessage) {
    $sql = "update post set postTitle = ?, postMessage = ? where postId = ?";
    DB::update($sql, array($postTitle, $postMessage, $postId));
}

// deletePost function
function deletePost($postId) {
    $sql = "delete from comment where commentPostId = ?";
    $code = DB::delete($sql, array($postId));
    $sql = "delete from post where postId = ?";
    DB::delete($sql, array($postId));
   
}

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

// Add comment to the current post
function addComment($postId, $commentName, $commentMessage) {
    $sql = "INSERT into comment (commentPostId, commentName, commentMessage) VALUES (?, ?, ?);";
    DB::insert($sql, array($postId, $commentName, $commentMessage));
    $commentId = DB::getPdo()->lastInsertId();
    return $commentId;
}

function deleteComment($commentId) {
    $sql = "delete from comment where commentId = ?" ;
    DB::delete($sql, array($commentId));
}

function getPostbyCommentid($commentId) {
    $sql = "select commentPostId from comment where commentId = ?;";
    $postsId= DB::select($sql, array($commentId));
    $postId = $postsId[0]->commentPostId;
    return $postId;
}

// Users
function getUsersProfile() {
    $sql = "select distinct(postName) from post";
    $users = DB::select($sql);
    return $users;
}

function getUserPosts($postName) {
    $sql = "select * from post where postName = ? order by postId desc";
    $posts = DB::select($sql, array($postName));
    return $posts;
}

?>
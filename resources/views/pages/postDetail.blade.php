@extends('layouts.master')
@section('title')
  Post Details
@endsection

@section('contentContainer')

  <div class="row">
    <div class="col-sm-4 form-border"> 
      <div class="name form-group"><h3>What would you like to do?</h3></div>
      <p><a class="postDetailsAnchor" href="{{url("/")}}">HomePage</a></p>
      <p><a class="postDetailsAnchor" href="{{url("updatePost/$post->postId")}}">Update Post</a></p>
      <p><a class="postDetailsAnchor" href="{{url("deletePost/$post->postId")}}">Delete Post</a></p>
    </div>

    <div class="col-sm-8">
      <div class="postnowFeed">
        <div class="feedTitle">
          <h3>Post Details</h3>
        </div>
        <div class="postNowPosts">
          <input type="hidden" name="id" value="{{ $post->postId }}">
          Post Title:<strong> {{$post->postTitle}}</strong>
          <p>Post Message: {{$post->postMessage}}</p>
    </div>
  </div>
@endsection
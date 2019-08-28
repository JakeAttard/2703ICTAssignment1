@extends('layouts.master')
@section('title')
  Post Details
@endsection

@section('contentContainer')
    <input type="hidden" name="id" value="{{ $post->postId }}">
    <h1>{{$post->postTitle}}</h1>
    <p>{{$post->postMessage}}</p>

    <p><a href="{{url("deletePost/$post->postId")}}">Delete Post</a></p>
    <p><a href="{{url("updatePost/$post->postId")}}">Update Post</a></p>
    <p><a href="{{url("/")}}">HomePage</a></p>
@endsection
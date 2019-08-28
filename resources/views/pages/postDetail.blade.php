@extends('layouts.master')
@section('title')
  Item Details
@endsection

@section('contentContainer')
    <input type="hidden" name="id" value="{{ $post->postId }}">
    <h1>{{$post->postTitle}}</h1>
    <p>{{$post->postMessage}}</p>

    <p><a href="{{url("delete_item_action/$post->postId")}}">Delete Item</a></p>
    <p><a href="{{url("update_item/$post->postId")}}">Update Item</a></p>
    <p><a href="{{url("/")}}">Home</a></p>
@endsection
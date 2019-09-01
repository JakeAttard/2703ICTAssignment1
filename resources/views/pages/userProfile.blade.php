@extends('layouts.master')

@section('title')
    Users
@endsection

@section('contentContainer')
    <div class="postnowFeed">
        <div class="feedTitle">
            <h3>PostNow Feed</h3>
        </div>
                
        <!-- This is looping through all the posts -->
        @foreach($posts as $post)
        <div class="postNowPosts">
            <img src="{{asset('images/postnowavatarimg.jpg')}}" class="postNowAvatarImg" alt="PostNow Avatar Picture">
            {{$post->postName}} <br>
            <strong><a href="{{url("postDetail/$post->postId")}}">{{$post->postTitle}}</a></strong> <br>
            <p>{{$post->postMessage}}<p>
            <p>Date Posted: {{$post->postCreated}}</p>
        </div>
        @endforeach
    </div>
@endsection('contentContainer')
@extends('layouts.master')

@section('title')
    Recent Posts
@endsection

@section('contentContainer')
    <div class="postnowFeed">
        <div class="feedTitle">
            <h3>Recent Posts</h3>
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

            <!-- Comments -->
            <div class="postNowComments">
                <a class="btn btn-secondary" href="{{url("viewComment/$post->postId")}}">
                    View Comment
                    @foreach ($comments as $comment)
                        @if($comment->postId == $post->postId)
                            <span class="badge">{{$comment->counter}}</span>
                        @endif
                    @endforeach
                </a>
            </div>
        @endforeach
    </div>
@endsection('contentContainer')
@extends('layouts.master')

@section('title')
    View Comment Page
@endsection

@section('contentContainer')
    <div class="row">
         <!-- Form -->
        <div class="col-sm-4 form-border">
            <form method="post" action="{{url('commentAdded')}}">
                {{csrf_field()}}
                <div class="name"><h2>Create Comment Form</h2></div>
                
                <input type="hidden" name="postId" value="{{$post->postId}}">

                <div class="name"><label>Name: </label><br>
                    <input type="text" name="commentName" placeholder="Please enter your name">
                </div>
                <div class="message"><label>Message: </label><br>
                    <textarea id="messagetextarea" name="commentMessage" rows="4" placeholder="Please enter new message"></textarea>
                </div>
                <div class="message">
                    <button class="btn btn-secondary" type="submit">Post Comment</button>
                </div>
            </form>
        </div>
         <!-- End Form -->    
         
        <div class="col-sm-8" >

            <div class="postnowFeed">
                <div class="feedTitle">
                    <h3>Post</h3>
                </div>
                <div class="postNowPosts">
                    <img src="{{asset('images/postnowavatarimg.jpg')}}" class="postNowAvatarImg" alt="PostNow Avatar Picture">
                    {{$post->postName}} <br>
                    <strong>{{$post->postTitle}}</strong> <br>
                    <p>{{$post->postMessage}}<p>
                    <p>Date Posted: {{$post->postCreated}}</p>
                </div>
                <div class="feedTitle">
                    <h3>Comments</h3>
                </div>
                <div class="postNowPosts">
                    @forelse ($comments as $comment)
                        <p>Comment Name - {{$comment->commentName}}</p>
                        <p>Comment Message - {{$comment->commentMessage}}</p>
                        <a class="btn btn-secondary" href="{{url("deleteComment/$comment->commentId")}}">Delete</a>
                        <hr>
                    @empty
                    <div class="feedTitle">
                        <h3>This post currently has no comments!</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
@endsection('contentContainer')
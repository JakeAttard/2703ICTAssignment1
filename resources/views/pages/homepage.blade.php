@extends('layouts.master')

@section('title')
    HomePage
@endsection

@section('contentContainer')

    <div class="row">
        
        <!-- Input Form Starts -->
        <div class="col-sm-4 form-border">    
            <form method="post" action="{{url('postAdded')}}">
                {{csrf_field()}}
                <div class="name form-group"><h3>Create A New Post</h3></div>
                
                <div class="name">
                    <label>User Name: </label><br>
                    <input type="text" name="postName" placeholder="Please enter your name" required>
                </div>

                <div class="title"><label>Post Title: </label><br>
                    <input type="text" name="postTitle" placeholder="Please enter a title" required>
                </div>

                <div class="message"><label>Post Message: </label><br>
                <textarea id="messagetextarea" name="postMessage" rows="4" placeholder="Please enter new message" required></textarea>
                </div>

                <div class="message">
                    <button type="submit" class="btn btn-secondary">POSTNOW</button>
                </div>
            </form>
        </div>
        <!-- Input Form Ends -->

        <!-- Posts Section -->
        <div class="col-sm-8">

            <div class="postnowFeed">
                <div class="feedTitle">
                    <h3>PostNow World Feed</h3>
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
        </div>
    </div>
@endsection
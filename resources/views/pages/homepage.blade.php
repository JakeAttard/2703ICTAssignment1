@extends('layouts.master')

@section('title')
    HomePage
@endsection

@section('contentContainer')

    <div class="row">
        
        <!-- Input Form Starts -->
        <div class="col-sm-4 form-border">    
            <form method="post" action="postAdded">
                {{csrf_field()}}
                <div class="name form-group"><h3>Create A New Post</h3></div>
                
                <div class="name">
                    <label>User Name: </label><br>
                    <input type="text" name="postName" value="" placeholder="Please enter your name">
                </div>

                <div class="title"><label>Post Title: </label><br>
                    <input type="text" name="postTitle" value="" placeholder="Please enter a title">
                </div>

                <div class="message"><label>Post Message: </label><br>
                <textarea id="messagetextarea" name="postMessage" rows="4" placeholder="Please enter new message"></textarea>
                </div>

                <div class="message">
                    <button type="submit" class="btn btn-secondary">POSTNOW</button>
                </div>

                @if (!empty($createPostError))
                    <p class="name error">Error: {{$createPostError}}</p>
                @endif
            </form>
        </div>
        <!-- Input Form Ends -->

        <!-- Posts Section -->
        <div class="col-sm-8">

            <div class="postnowFeed">
                <div class="name form-group">
                    <h3>PostNow Feed</h3>
                </div>
                
                <!-- This is looping through all the posts -->
                @foreach($posts as $post)
                <div class="postNowPosts">
                    <!-- <p>{{$post->postId}}</p> <br> -->
                    
                    <img src="{{asset('images/postnowavatarimg.jpg')}}" width="80px" height="80px"  alt="PostNow Avatar Picture">
                    <strong>{{$post->postName}}</strong> <br>
                    <strong>{{$post->postTitle}}</strong> <br>
                    <p>{{$post->postMessage}}<p>
                    <p>Post Created: {{$post->postCreated}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
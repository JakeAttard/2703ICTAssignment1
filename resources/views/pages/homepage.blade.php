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
            @foreach($posts as $post)
                <p>{{$post->postId}}: {{$post->postName}}: {{$post->postTitle}}: {{$post->postMessage}}<p>
            @endforeach
        </div>
    </div>
@endsection
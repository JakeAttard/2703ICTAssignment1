@extends('layouts.master')

@section('title')
    HomePage
@endsection

@section('contentContainer')

    <div class="row">
        
        <!-- Input Form Starts -->
        <div class="col-sm-4 form-border">
            {{csrf_field()}}    
            <form method="post" action="postAdded">
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
        <div class="col-sm-8"></div>
         <!-- Input Form Ends -->      
    </div>
@endsection
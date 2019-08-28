@extends('layouts.master')

@section('title')
    Update Post
@endsection

@section('contentContainer')
    <div class="row">
        
        <!-- Input Form Starts -->
        <div class="col-sm-4 form-border">
            <form method="post" action="{{url("updatePost")}}">
                {{csrf_field()}}
                <input type="hidden" name="postId" value="{{ $post->postId }}">

                <div class="name form-group"><h3>Update Post</h3></div>

                <div class="title"><label>Post Title: </label><br>
                    <input type="text" name="postTitle" value="{{$post->postTitle}}">
                </div>

                <div class="message"><label>Post Message: </label><br>
                <textarea id="messagetextarea" name="postMessage" rows="4">{{$post->postMessage}}</textarea>
                </div>

                <div class="message">
                    <button type="submit" class="btn btn-secondary">Update Post</button>
                </div>
            </form>
        </div> 
    </div>   
@endsection
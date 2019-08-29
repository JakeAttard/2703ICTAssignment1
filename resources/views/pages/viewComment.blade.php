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
                <!-- Error message -->
                <input type="hidden" name="postId" value="{{$post->postId}}">

                <div class="name"><label>Name: </label><br>
                    <input type="text" name="name" placeholder="Enter your name" value="">
                </div>
                <div class="message"><label>Message: </label><br>
                    <textarea id="messagetextarea" name="message" rows="4" placeholder="Enter new message"></textarea>
                </div>
                <div class="message">
                    <button class="btn btn-warning" type="submit">Create new comment</button>
                </div>
            </form>
        </div>
         <!-- End Form -->    
         
        <div class="col-sm-8" >
            <h2>View Comment Page</h2>
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <img src="{{asset('images/postnowavatarimg.jpg')}}" class="postNowAvatarImg" alt="PostNow Avatar Picture">>
                    <span class="username">{{$post->postName}}</span>
                    <h4>{{$post->postTitle}}</h4>
                    <p>{{$post->postMessage}}</p>
                </div>
                
                <div class="panel-body">
                    <ul class="list-group">
                    @forelse ($comments as $comment)
                        <li class="list-group-item clearfix">
                            <p>{{$comment->commentName}}</p>
                            <span>{{$comment->commentMessage}}</span>
                            <a class="btn btn-danger pull-right" href="{{url("deleteComment/$comment->commentId")}}">Delete</a>
                        </li>
                    @empty
                    <h3 class="error-middle">no comment</h3>
                    </ul>
                </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection('contentContainer')
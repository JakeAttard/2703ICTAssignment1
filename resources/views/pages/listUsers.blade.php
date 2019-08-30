@extends('layouts.master')

@section('title')
    Users
@endsection

@section('contentContainer')
    <div class="postnowFeed">
        <div class="feedTitle">
            <h3>PostNow Users</h3>
        </div>         
        <!-- This is looping through all the posts -->
        @forelse ($postNames as $postName)
            <div class="postNowPosts">
                <img src="{{asset('images/postnowavatarimg.jpg')}}" class="postNowAvatarImg" alt="PostNow Avatar Picture">
                <a href="{!!'usersProfile/'.$postName->postName !!}">{{$postName->postName}}</a>
            </div>
        @endforeach
    </div>
@endsection('contentContainer')
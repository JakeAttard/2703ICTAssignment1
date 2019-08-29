@extends('layouts/master')

@section('title')
    UserProfile Page
@endsection


@section('contentContainer')
    <div id="usersList">
        @forelse($users as $user)
            <div class="user">
                <p class="username"> {{ $user->name }} </p>
                <a class="show-posts-link" href="userPosts/{{$user->id}}">View Posts</a>
            </div>
            <br>
        @empty
            No users found.
        @endforelse
    </div>
@endsection
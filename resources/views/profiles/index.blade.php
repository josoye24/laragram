@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="div col-3 p-5">
            <img src="/storage/{{$user->profile->image}}" alt="profile pix" class="rounded-circle w-100">
        </div>

        <div class="div col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
               
               <div class="d-flex align-items-center pb-3">
                    <h2>{{ $user->username }}</h2>

               <follow-button user-username="{{ $user->username }}" follows="{{ $follows}}"></follow-button>
               </div>
                
                @can("update", $user->profile)

                <a href="/p/create">Add now Post </a> 
                @endcan

            </div>

            @can("update", $user->profile)
                <a href="/profile/{{ $user->username }}/edit">Edit Profile </a>
            @endcan

            <div class="div d-flex">
                <div class="pr-5"><strong>{{ $postCount }} </strong> posts</div>
                <div class="pr-5"><strong>{{ $followerCount }} </strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }} </strong> following</div>
            </div>
            <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
            <div> {{ $user->profile->description }} </div>
            <div><a href="//{{ $user->profile->url }}" >{{ $user->profile->url ?? "NA" }}</a></div>
        </div>


        <div class="row">

        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href = "/p/{{ $post->id}}">
                <img src="/storage/{{$post->image}}" alt="img" class="w-100">
                </a>
                
            </div>
        @endforeach
        </div>  


    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container mt--7">
    <div class="row">
        <div class="col-xl-8">
            <img src="/storage/{{$post->image}}" alt="img" class="w-100 mb-3">
        </div>

        <div class="col-lg-4">
            <div class="d-flex align-items-center" >
                <div class="pr-3">
                    <img src="/storage/{{$post->user->profile->image}}" alt="img" class="rounded-circle w-100" style="max-width: 40px" >
                </div>
                <div class="font-weight-bold">
                    <a href="/profile/{{ $post->user->username}}">
                    <span class="text-dark"> {{ $post->user->username }} </span> 
                    </a> |
                    <a href="#" class="pl-3">Follow</a>
                </div>
            </div>    
            
            <hr> 
            
            <div class="font-weight-bold d-flex">
                <div class="pr-2"><a href="/profile/{{ $post->user->username}}">
                    <span class="text-dark"> {{ $post->user->username }} </span> </a>
                </div>

                <p>{{ $post->caption }}</p>
            </div>      
            
        </div>    
    </div>
    @include('layouts.footers.auth')

</div>
@endsection
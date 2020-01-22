@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
        @foreach ($posts as $post)
            <div class="col-6 offset-3 pb-5">
                <a href = "/p/{{ $post->id}}">
                <img src="/storage/{{$post->image}}" alt="img" class="w-100">
                </a>
                <div class="font-weight-bold"> 
                    <a href="/profile/{{$post->username}}">
                        <span class="text-dark"> {{$post->username}} </span>
                    </a> 
                </div>  {{$post->caption}}
                
                
            </div>
        @endforeach

        <div class="row container justify-content-between">
            <div class="col-6 offset-3">
                {{$posts->links()}}
            </div>
            
        </div>
        </div>  


    </div>
</div>
@endsection

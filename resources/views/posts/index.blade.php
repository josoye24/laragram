@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <h2 class="mb-3">Featured Stories</h2>
            <div class="bg-transparent">
                <div class="row align-items-center">

                    @foreach ($stories as $story)
                        <div class="col-xl-3 col-6 mb-4">
                            <a href = "/p/{{ $story->slug}}">
                            <img src="/storage/{{$story->image}}" alt="img" class="w-100" style="border-radius: 5%">
                            </a>
                            
                        </div>
                    @endforeach

                </div>
            </div>

            <hr>


            <h2 class="mb-4">Latest Feed</h2>

            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        @foreach ($posts as $post)
                            <div class="col-xl-9 col-sm-0 pb-5">
                                <a href = "/p/{{ $post->slug}}">
                                <img src="/storage/{{$post->image}}" alt="img" class="w-100">
                                </a>
                                <div class="font-weight-bold"> 
                                    <a href="/profile/{{$post->username}}">
                                        <span class="text-dark"> {{$post->username}} </span>
                                    </a> 
                                </div>  {{$post->caption}}
                            </div>
                        @endforeach
                        
                        @empty($post)
                            <div class="col">No post to show, follow users to get post</div>
                        @endempty
            
                        <div class="justify-content-center">
                            <div class="col">
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>  
            
                </div>
            </div>
            <hr>


        </div>

        <!--New Followers-->
        
        <div class="col-xl-4">
            <h2 class="mb-3 text-muted">New Followers</h2>
            @foreach ($newFollowers as $followers)
            <div class="bg-white shadow-sm mb-2 p-2 pl-4" style="border-radius:15px">

                <div class="row align-items-center">
                    <div class="pl-3 pr-1" >
                        <img src="/storage/profile/DwcK1Ekb7kBCO1hC6RjDtIcCAwKansam87bKZW85.jpeg" alt="img" class="rounded-circle w-100" id="ProfileCircleSmall" style="max-width: 45px" >
                    </div>
                    <div class="div col-9">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="/profile/{{$followers->username}}"> <span class="text-dark"> {{ $followers->name }} </span>
                                <br><small class="text-muted"> @ {{ $followers->username }} </small> </a>
                            </div>
                             <follow-button user-username="{{ $followers->username }}" follows="{{ $follows }}"></follow-button>
                        </div>
                    </div>    
                </div>
            </div>
            @endforeach
        </div>
    </div>
     @include('layouts.footers.auth')

</div>

@endsection

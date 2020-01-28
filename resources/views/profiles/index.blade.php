@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            @if (session('post_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('post_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h2 class="mb-3">Latest Feed</h2>
            <div class="bg-transparent">
                <div class="row align-items-center">

                    @foreach ($profilePost as $post)
                        <div class="col-xl-4 col-sm mb-4">
                            <a href = "/p/{{ $post->slug}}">
                            <img src="/storage/{{$post->image}}" alt="img" class="w-100" style="border-radius: 5%">
                            </a>
                            
                        </div>
                    @endforeach

                </div>
            </div>
            
            <div class="justify-content-center">
                <div class="col">
                    {{$profilePost->links()}}
                </div>
            </div>

            <hr>


        </div>
        
        <!--Righ Bar-->
        <div class="col-xl-4">
            <div class="card-header bg-transparent">
                <div class="col mb-2">
                    <img src="/storage/{{$users->profile->image}}" alt="profile pix" class="w-100" style="border-radius: 5%">
                </div>
                
                <div class="col text-center">
                    <h2 class="mb-1">{{ $users->name }}</h2>
                    <div class="text-center d-inline-flex align-items-baseline">
                        <h5 class="text-muted mr-3"> @ {{ $users->username }} </h5>
                        <!-- Follow Button using VueJS-->
                        @if (Gate::allows('update', $user->profile)) 
                            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary mb-2">Edit Profile</a>    
                        @else    
                            <a href="#" class="btn btn-sm btn-primary mb-2">Follow</a>    
                        @endif

                            
                        
                    </div>    
                    <div class="d-inline-flex ">
                        <h4> {{ $usersPostCount }} <h4 class="font-weight-normal text-muted pl-1 mr-4 "> Posts </h4></h4>
                        <h4> {{ $usersFollowerCount }} <h4 class="font-weight-normal text-muted pl-1 mr-4"> Followers </h4></h4>
                        <h4> {{ $usersFollowingCount }} <h4 class="font-weight-normal text-muted pl-1"> Following </h4></h4>
                    </div>

                </div>

                <div class="col ">
                    <div class="text-justify">{{ $users->profile->bio }}</div>

                    @if (!empty ($users->profile->location))
                        <div class="pt-4"> <strong> Location </strong><br> {{ $users->profile->location }}</div>
                    @endif


                    @if (!empty ($users->profile->profession))
                        <div class="pt-4"> <strong> Profession </strong><br> {{ $users->profile->profession}}</div>
                    @endif

                    @if (!empty ($users->profile->website))
                        <div class="pt-4"> <strong> Website </strong> <br> <a href="//{{ $users->profile->website }}" >{{ $users->profile->website }}</a></div>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

@endsection
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <div class="d-flex justify-content-center mt-4">
                <div><img src="/asset/instagram-logo.png" alt="logo text" style="height:25px; border-right:1px solid" class="pr-3 pt-1"> </div>
                <div><img src="/asset/laragram.png" alt="logo" style="height:40px" class="pl-3"> </div>
            </div>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Profile Image" src="/storage/{{$user->profile->image}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">

                    <a href="/p/create" class="dropdown-item">
                        <i class="fa fa-edit"></i>
                        <span>{{ __('Create New Post') }}</span>
                    </a>                    
                    <a href="/profile/{{$user->username}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand"></div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Mobile Search Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!--Profile Details-->
            <div class="div col-xl-3 p-4" >
                <img src="/storage/{{$user->profile->image}}" alt="profile pix" class="rounded-circle w-100" id="ProfileCircle">
                <h3 class="text-center mt-2">{{ $user->name }} </h3>
                <h5 class="text-center text-muted"> @ {{ $user->username }} </h5>
            </div>

        
            <div class="d-flex text-center mb-4" >
                <div class="pr-3 h5">{{ $postCount }} <h5 class="font-weight-normal text-muted"> Posts </h5></div>
                <div class="pr-3 h5">{{ $followerCount }} <h5 class="font-weight-normal text-muted">  Followers<h5></div>
                <div class="pr-3 h5">{{ $followingCount }} <h5 class="font-weight-normal text-muted"> Following </h5></div>
            </div>


            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::path() === "/" ? 'active' : '' }}" href="{{ route('home') }}" aria-controls="toggles-component" aria-selected="true">

                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Feed') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/profile/{{$user->username}}">
                        <i class="ni ni-single-02 text-green"></i> {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-send text-gray"></i> {{ __('Direct') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.edit')}}">
                        <i class="ni ni-settings-gear-65 text-danger"></i> {{ __('Settings') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </li>
                

            </ul>
            
        </div>
    </div>
</nav>

<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Search Form -->
        <form class="form-inline d-none d-md-flex mr-sm-auto">
            <div class="form-group ">
                <div class="input-group input-group-alternative input-group-sm bordered" style="border: 3px solid white">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text" size="55">
                </div>
            </div>
        </form>

        <!--- Righ Nar Bar -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <!-- Creat New Post-->
            <a href="/p/create" class="btn btn-sm btn-danger mr-3">Create New Post</a>
        
            <!-- Notivation-->
            <div class="col right d-flex">
                <a href="#"><i class="fa fa-bell mr-4" id="fontAwsome"></i></a>
                <a href="#"><i class="fa fa-envelope" id="fontAwsome"></i></a>
            </div>
        
            <!-- User -->        
            <li class="nav-item dropdown mr-5">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Profile Image" src="/storage/{{$user->profile->image}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
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
    </div>
</nav>

<style>
    #fontAwsome {
        color:#a6adba;
    } 
    
    #fontAwsome:hover {
        color:#525f7f;
    }

 

</style>

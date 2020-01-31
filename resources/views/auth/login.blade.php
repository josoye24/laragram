@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent">
                       
                        <div class="d-flex justify-content-center mt-4">
                            <div><img src="/asset/instagram-logo.png" alt="logo text" style="height:25px; border-right:1px solid" class="pr-3 pt-1"> </div>
                            <div><img src="/asset/laragram.png" alt="logo" style="height:40px" class="pl-3"> </div>
                        </div>
            
                    </div>
                    <div class="card-body px-lg-5 py-lg-4">
                        <div class="text-center text-muted mb-4">
                            <small>
                                <a href="{{ route('register') }}">{{ __('Create new account') }}</a> {{ __('OR Sign in with these credentials:') }}
                            </small>
                            <br>
                            <small>
                                {{ __('Username') }} <strong>user@example.com</strong>
                                {{ __('Password') }} <strong>password</strong>
                            </small>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required autofocus>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Log in') }}</button>
                            </div>
                        </form>

                        <hr>
                        <div class="btn-wrapper text-center mb-2">
                            <a href="#" class="btn-icon" style="color:#3b5998">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                                <span class="btn-inner--text">{{ __('Log in with Facebook') }}</span>
                            </a>
                            <div class="justify-content-center mt-2">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted">
                                        <small>{{ __('Forgot password?') }}</small>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                    
                </div>

                <div class="card bg-secondary shadow border-0 mt-3">
                    <h3 class="card-header bg-transparent text-center">
                        <small class="text-muted">{{ __('Dont have an account? ') }} </small>
                        <a href="{{ route('register') }}" >
                        <small>{{ __('Sign up') }} </small>
                        </a>                    
                    </h3>
                </div>

            </div>
        </div>
    </div>
@endsection

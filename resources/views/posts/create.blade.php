@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')


<div class="container-fluid mt--5">
    <div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="col-12 mb-0">{{ __('Add New Post') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/p/create" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
            

                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('caption') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Post Caption') }}</label>
                        <input type="text" name="caption" id="input-caption" class="form-control form-control-alternative{{ $errors->has('caption') ? ' is-invalid' : '' }}" placeholder="{{ __('Caption') }}" value="{{ old('caption') }}" required autofocus>

                        @if ($errors->has('caption'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('caption') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-image">{{ __('Post Image') }}</label>
                        <div style="position:relative;">
                            <a class='btn btn-primary' href='javascript:;'>
                                Choose File...
                                <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" onchange='$("#upload-file-info").html($(this).val());' required>
                            </a>
                            &nbsp;
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Add New Post') }}</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    @include('layouts.footers.auth')

</div>



@endsection


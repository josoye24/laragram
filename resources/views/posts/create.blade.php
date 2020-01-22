@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Post</h1>
 
    <form action="/p/create" method="POST" enctype="multipart/form-data">
        @csrf
         
        <div class="row">
            <div class="col-8 offset-2">

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Posts Caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" 
                        value="{{ old('caption') }}"
                        required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-8 offset-2">

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input id="image" type="file" class="form-control-file" name="image" required>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="pt-5">
                        <button class="btn btn-primary">Add New Post</button> 
                    </div>
            
                </div>
            </div>
        </div>




    
    
    
    </form>

</div>

@endsection

@extends('admin.layouts.main')
@section('title', 'Edit Media')

@section('content')

<div class="graphs">
    <h3 class="blank1">Edit Media {{ $media->media_name }}</h3>  


    @if(session('message'))

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success !</strong> {{session('message')}}  
    </div>

    @endif

        <div class="col-sm-12">
            <img src="{!! asset('images/upload/'.$media->media_name) !!}" class="img-responsive center-block" width="50%">
        </div>

    <br>
    <form method="post">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning !</strong> {{$error}} 
        </div>        
        @endforeach
        {!! csrf_field() !!}

        <div class="form-group" >
            <label for="focusedinput" class="control-label">Media Description</label>
            <div class="col-sm-12">
                <textarea class="form-control1" placeholder="Media Description" id="cat_desc" name="media_desc">{{ $media->media_description }}</textarea>

            </div>
        </div>
        <button class="btn-success btn btn-block" type="submit">Submit</button>

    </form>
</div>

@endsection


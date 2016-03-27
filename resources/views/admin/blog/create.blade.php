@extends('admin.layouts.main')
@section('title', 'Create Blog Post')

@section('content')

<div class="graphs">
    <h3 class="blank1">Create Blog Post</h3>  


    @if(session('message'))

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success !</strong> {{session('message')}}  
    </div>

    @endif

    <form method="post">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning !</strong> {{$error}} 
        </div>        
        @endforeach
        {!! csrf_field() !!}
        <div class="form-group" >
            <label for="focusedinput" class="control-label">Title</label>

            <input type="text" class="form-control1" id="focusedinput" placeholder="Post Ttitle" name="title" value="{{ old('title') }}">


        </div>
        <div class="form-group" >
            <label for="focusedinput" class="control-label">Post Content</label>

            <textarea cols="200" rows="5" class="form-control1" placeholder="Post Content" name="content">{{ old('content') }}</textarea>


        </div>
        <button class="btn-success btn btn-block" type="submit">Submit</button>

    </form>
</div>

@endsection

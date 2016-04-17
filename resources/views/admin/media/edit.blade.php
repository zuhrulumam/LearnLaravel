@extends('admin.layouts.main')
@section('title', 'Edit Category')

@section('content')

<div class="graphs">
    <h3 class="blank1">Edit Category Slug : {{ $category->slug }}</h3>  


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
            <label class="control-label">Category Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control1" placeholder="Category Name" name="cat_name" value="{{ $category->category_name }}">
            </div>

        </div>
        <div class="form-group" >
            <label for="focusedinput" class="control-label">Category Description</label>
            <div class="col-sm-12">
                <textarea class="form-control1" placeholder="Category Description" id="cat_desc" name="cat_desc">{{ $category->category_description }}</textarea>

            </div>
        </div>
        <button class="btn-success btn btn-block" type="submit">Submit</button>

    </form>
</div>

@endsection


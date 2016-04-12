@extends('admin.layouts.main')
@section('title', 'Edit Comment')

@section('content')

<div class="graphs">
    <h3 class="blank1">Edit Comment Slug : {{ $comment->comment_slug }}</h3>  


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
            <label class="control-label">Email</label>
            <div class="col-sm-12">
                <input type="email" class="form-control1" placeholder="Email" name="email" value="{{ $comment->email }}">
            </div>

        </div>

        <div class="form-group" >
            <label class="control-label">Created By</label>
            <div class="col-sm-12">
                <input type="text" class="form-control1" placeholder="Created by" name="comment_created_by" value="{{ $comment->comment_created_by }}">
            </div>

        </div>

        <div class="form-group" >
            <label for="focusedinput" class="control-label">Comment Content</label>
            <div class="col-sm-12">
                <textarea class="form-control1" placeholder="Comment Content" id="cat_desc" name="comment_content">{{ $comment->comment_content }}</textarea>

            </div>
        </div>

        <div class="form-group" >
            <label for="focusedinput" class="control-label">Comment Status</label>
            <div class="col-sm-12">
                @if($comment->status == 1)
                <input type="checkbox" name="status" checked="checked" name="status"> Confirmed
                @else 
                <input type="checkbox" name="status" name="status"> Not Confirmed
                @endif
            </div>
        </div>
        <button class="btn-success btn btn-block" type="submit">Submit</button>

    </form>
</div>

@endsection


@extends('admin.layouts.main')
@section('title', 'Read Media')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $media->media_name }}</h3>
    </div>
    <div class="panel-body">
        <img src="{!! asset('images/upload/'.$media->media_name) !!}" class="img-responsive center-block" width="50%">
        <br>
       Description :  {{ $media->media_description }}


    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{!! action('admin\MediaController@getEdit', ['slug'=>$media->media_slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\MediaController@postDelete', ['slug'=>$media->media_slug]) !!}">
            {!! csrf_field() !!}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>

@endsection
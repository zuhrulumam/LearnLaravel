@extends('admin.layouts.main')
@section('title', 'Read Post')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $post->blog_title }}</h3>
    </div>
    <div class="panel-body">
        {{ $post->blog_content }}
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{!! action('admin\BlogController@getEditPost', ['slug'=>$post->slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\BlogController@postDelete', ['slug'=>$post->slug]) !!}">
            {!! csrf_field() !!}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>

@endsection
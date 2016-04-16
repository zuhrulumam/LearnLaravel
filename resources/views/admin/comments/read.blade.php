@extends('admin.layouts.main')
@section('title', 'Read Comment')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $comment->comment_slug }}/h3>
    </div>
    <div class="panel-body">
        {{ $comment->comment_content }}
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{!! action('admin\CommentController@getEdit', ['slug'=>$comment->comment_slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\CommentController@postDelete', ['slug'=>$comment->comment_slug]) !!}">
            {!! csrf_field() !!}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>

@endsection
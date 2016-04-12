@extends('admin.layouts.main')
@section('title', 'Read Comment')

@section('content')
<div class="ui card">
    <div class="content">
        <div class="header">{{ $comment->comment_slug }}</div>
    </div>
    <div class="content">
        <h4 class="ui sub header">Content</h4>
        <div class="ui small feed">
            <div class="event">
                <div class="content">
                    <div class="summary">
                        {{ $comment->comment_content }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="extra content">
        <a href="{!! action('admin\CommentController@getEdit', ['slug'=>$comment->comment_slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\CommentController@postDelete', ['slug'=>$comment->comment_slug]) !!}">
            {!! csrf_field() !!}
            <button class="fluid  ui red button" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
@extends('admin.layouts.main')
@section('title', 'Read Post')

@section('content')
<div class="ui card">
    <div class="content">
        <div class="header">{{ $post->blog_title }}</div>
    </div>
    <div class="content">
        <h4 class="ui sub header">Content</h4>
        <div class="ui small feed">
            <div class="event">
                <div class="content">
                    <div class="summary">
                        {{ $post->blog_content }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="extra content">
        <a href="{!! action('admin\BlogController@getEditPost', ['slug'=>$post->slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\BlogController@postDelete', ['slug'=>$post->slug]) !!}">
            {!! csrf_field() !!}
            <button class="fluid  ui red button" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
@extends('admin.layouts.main')
@section('title', 'Read Category')

@section('content')
<div class="ui card">
    <div class="content">
        <div class="header">{{ $category->category_name }}</div>
    </div>
    <div class="content">
        <h4 class="ui sub header">Content</h4>
        <div class="ui small feed">
            <div class="event">
                <div class="content">
                    <div class="summary">
                        {{ $category->category_description }}
                        <br>
                        Post with this category <br>
                        @foreach($category->posts as $post)
                        {{ $post->blog_title }},
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="extra content">
        <a href="{!! action('admin\BlogController@getEditPost', ['slug'=>$category->category_slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\BlogController@postDelete', ['slug'=>$category->category_slug]) !!}">
            {!! csrf_field() !!}
            <button class="fluid  ui red button" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
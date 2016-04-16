@extends('admin.layouts.main')
@section('title', 'Read Category')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $category->category_name }}</h3>
    </div>
    <div class="panel-body">
        {{ $category->category_description }}
        <br>
        Post with this category <br>
        @foreach($category->posts as $post)
        {{ $post->blog_title }},
        @endforeach
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{!! action('admin\BlogController@getEditPost', ['slug'=>$category->category_slug]) !!}">Edit</a>
        <form method="post" action="{!! action('admin\BlogController@postDelete', ['slug'=>$category->category_slug]) !!}">
            {!! csrf_field() !!}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>

@endsection
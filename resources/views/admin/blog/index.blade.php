@extends('admin.layouts.main')
@section('title', 'Posts')

@section('css')
<link rel="stylesheet" href="{!! asset('css/table.min.css') !!}" type="text/css">
@endsection
@section('content')
@if(session('message'))
<div class="ui positive message">
    <i class="close icon"></i>
    {{session('message')}}        
</div>
@endif

@if($posts->isEmpty())
There is no post yet !! 
@else

<table class="ui selectable inverted table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td><a href="{!! action('admin\BlogController@getReadPost', ['slug'=>$post->slug]) !!}">{{ $post->blog_title }}</a></td>
            <td>{{ $post->blog_content }}</td>
            <td class="selectable">
                <a href="{!! action('admin\BlogController@getEditPost', ['slug'=>$post->slug]) !!}">Edit</a>
                <form method="post" action="{!! action('admin\BlogController@postDelete', ['slug'=>$post->slug]) !!}">
                    {!! csrf_field() !!}
                    <button class="fluid  ui red button" type="submit">Delete</button>
                </form>
                
            </td>
        </tr>        
        @endforeach
    </tbody>
</table>
@endif
@endsection

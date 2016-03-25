@extends('admin.layouts.main')
@section('title', 'Posts')

@section('css')
<link rel="stylesheet" href="{!! asset('css/table.min.css') !!}" type="text/css">
@endsection
@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{session('message')}}  
</div>

@endif
<div class="graphs">
    <h3 class="blank1">All Posts</h3>

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
                    <a href="{!! action('admin\BlogController@getEditPost', ['slug'=>$post->slug]) !!}">
                        <span class="lnr lnr-pencil"></span> Edit
                    </a>
                    <a href="#">
                        <span class="lnr lnr-trash"></span> Delete
                    </a>
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
</div>
@endsection

@extends('admin.layouts.main')
@section('title', 'Edit Post')

@section('content')
<div class="example">
   
    <form class="form-horizontal" method="post">
        @foreach ($errors->all() as $error)
        <div class="ui negative message">
            <i class="close icon"></i>
            {{$error}}        
        </div>
        @endforeach
        {!! csrf_field() !!}
        <div class="ui form segment">
            <div class="field">
                <label>Title</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="Judul Post" name="title" value="{{ $post->blog_title }}">
                    <div class="ui corner label">
                        <i class="asterisk icon"></i>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Post Content</label>
                 <div class="ui corner labeled input">
                     <textarea name="content" placeholder="Post Content">{{ $post->blog_content }}</textarea>
                    <div class="ui corner label">
                        <i class="asterisk icon"></i>
                    </div>
                </div>
                
            </div>
           
            <button class="fluid  ui blue button" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection


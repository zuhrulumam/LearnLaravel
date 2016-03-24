@extends('admin.layouts.main')
@section('title', 'Create Blog Post')

@section('content')
<div class="example">

    @if(session('message'))
    <div class="ui positive message">
        <i class="close icon"></i>
        {{session('message')}}        
    </div>
    @endif
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
                    <input type="text" placeholder="Judul Post" name="title">
                    <div class="ui corner label">
                        <i class="asterisk icon"></i>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Post Content</label>
                 <div class="ui corner labeled input">
                     <textarea name="content" placeholder="Post Content"></textarea>
                    <div class="ui corner label">
                        <i class="asterisk icon"></i>
                    </div>
                </div>
                
            </div>
            <button class="fluid  ui green button" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

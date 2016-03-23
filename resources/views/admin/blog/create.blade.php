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
                <div class="ui input">                
                    <input type="text" placeholder="Judul Post" name="title">
                </div>
            </div>
            <div class="field">
                <label>Post Content</label>
                <textarea name="content"></textarea>
            </div>
            <button class="fluid  ui green button" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

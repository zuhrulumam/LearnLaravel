@extends('admin.layouts.main')
@section('title', 'Create Blog Post')

@section('content')
<div class="example">
    <form class="form-horizontal" method="post">
        {!! csrf_field() !!}
        <div class="ui form segment">
            <div class="field">
                <label>Judul</label>
                <div class="ui input">                
                    <input type="text" placeholder="Judul Post">
                </div>
            </div>
            <div class="field">
                <label>Isi Post</label>
                <textarea></textarea>
            </div>
            <div class="ui submit button">Submit</div>
        </div>
    </form>
</div>
@endsection

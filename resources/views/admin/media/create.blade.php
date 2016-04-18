@extends('admin.layouts.main')
@section('title', 'Create Media')

@section('css')
<style>
    .error{
        padding: 0;
    }

    .help-block{}
</style>
<link href="{!! asset('css/dropzone.min.css') !!}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="graphs">
        <h3 class="blank1">Create Media</h3>  


        @if(session('message'))

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success !</strong> {{session('message')}}  
        </div>

        @endif

        <form method="post" id="createForm"  class="dropzone" action="{{ action('admin\MediaController@postCreate') }}">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning !</strong> {{$error}} 
            </div>        
            @endforeach
            {!! csrf_field() !!}                

        </form>

    </div>


    @endsection

    @section('js')    

    <script src="{!! asset('js/dropzone.min.js') !!}"></script>
    <script src="{!! asset('js/dropzone-config.js') !!}"></script>
    @endsection

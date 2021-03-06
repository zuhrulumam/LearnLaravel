@extends('admin.layouts.main')
@section('title', 'Create Category')

@section('css')
<style>
    .error{
        padding: 0;
    }

    .help-block{}
</style>

<script src="{!! asset('js/sample.js') !!}"></script>
@endsection

@section('content')

<div class="graphs">
    <h3 class="blank1">Create Category</h3>  


    @if(session('message'))

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success !</strong> {{session('message')}}  
    </div>

    @endif

    <form method="post" id="createForm" class="form-horizontal">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning !</strong> {{$error}} 
        </div>        
        @endforeach
        {!! csrf_field() !!}

        <div class="form-group" >
            <label class="control-label">Category Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control1" placeholder="Category Name" name="cat_name" value="{{ old('cat_name') }}">
            </div>

        </div>
        <div class="form-group" >
            <label for="focusedinput" class="control-label">Category Description</label>
            <div class="col-sm-12">
                <textarea class="form-control1" placeholder="Category Description" id="cat_desc" name="cat_desc">{{ old('cat_desc') }}</textarea>

            </div>
        </div>
        <button class="btn-success btn btn-block" type="submit">Submit</button>

    </form>
    
</div>


@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function () {
    $("#createForm").validate({
        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            content: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            title: {
                required: "Please enter a Post title",
                minlength: "Post Title must consist of at least 3 characters",
                maxlength: "Post Title max 255 characters"
            },
            content: {
                required: "Please provide Post Content",
                minlength: "Post Content must be at least 10 characters long"
            }
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
//                error.addClass("help-block");
//                
            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents(".col-sm-12").addClass("has-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!element.next("span")[ 0 ]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
            }
        },
        success: function (label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!$(element).next("span")[ 0 ]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-error").removeClass("has-success");
            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-success").removeClass("has-error");
            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
        }
    });

});
</script>


@endsection

@extends('admin.layouts.main')
@section('title', 'Comments')

@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{ session('message') }}  
</div>

@endif
<div class="graphs">
    <h3 class="blank1">All Comments</h3>

    @if($comments->isEmpty())
    There is no comment yet !! 
    @else
    <table class="ui selectable inverted table">
        <thead>
            <tr>
                <th>Comment Slug</th>
                <th>Comment Content</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td><a href="{!! action('admin\BlogController@getReadPost', ['slug'=>$comment->comment_slug]) !!}">{{ $comment->comment_slug }}</a></td>
                <td>{{ $comment->comment_content }}</td>
                <td>{{ $comment->comment_created_by }}</td>
                <td>
                    @if($comment->status == 0) 
                    <a class="btn btn-danger btn-lg" data-id="{{ $comment->comment_slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#statusModal" data-status="0">
                        <span class="lnr lnr-pencil"></span> Not confirmed
                    </a>  
                    @else 

                    <a class="btn btn-success btn-lg" data-id="{{ $comment->comment_slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#statusModal" data-status="1">
                        <span class="lnr lnr-pencil"></span> Confirmed
                    </a>  
                    @endif
                </td>
                <td class="selectable">
                    <a class="btn btn-success btn-lg" href="{!! action('admin\BlogController@getEditPost', ['slug'=>$comment->comment_slug]) !!}">
                        <span class="lnr lnr-pencil"></span> Edit
                    </a>                    
                    <a data-id="{{ $comment->comment_slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                        <span class="lnr lnr-trash"></span> Delete
                    </a>


                </td>
            </tr>        
            @endforeach
        </tbody>
    </table>
    @endif

    <a href="{!! action('admin\CommentController@getCreate') !!}" class="btn btn-block btn-primary">Add Comment</a>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Post</h4>
                </div>
                <div class="modal-body">
                    <p class="modal-text"></p>
                </div>
                <div class="modal-footer">
                    <form method="comment" action="#" class="modal-form">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                    
                        {!! csrf_field() !!}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Status -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Change Status</h4>
                </div>
                <div class="modal-body">
                    <p class="modal-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                    <a href="#" class="btn btn-success changeStatus">Yes</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);// Button that triggered the modal
        var slug = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Delete  ' + slug);
        modal.find('.modal-text').text('Are you sure to delete comment with slug   ' + slug);

        var action = "{!! action('admin\BlogController@postDelete', ['slug'=>'slug']) !!}";
        action = action.replace('slug', slug);

        modal.find('.modal-form').attr('action', action);
    });
</script>

<!--Ubah status Modal-->
<script type="text/javascript">
    $('#statusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);// Button that triggered the modal
        var slug = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var status = button.data('status'); // Extract info from data-* attributes

        var modal = $(this);
        modal.find('.modal-title').text('Ubah Status ' + slug);

        if (status === 0) {
            modal.find('.modal-text').text('Are you sure want to change status  ' + slug + ' become Confirmed');
        } else {
            modal.find('.modal-text').text('Are you sure want to change status  ' + slug + ' become Not Confirmed');
        }

        var href = "{!! action('admin\CommentController@changeStatus', ['slug'=>'slug', 'status'=>'status']) !!}";
        href = href.replace('slug', slug);
        href = href.replace('status', status);

        modal.find('.changeStatus').attr('href', href);
    });
</script>

<script>
    $(document).pjax('a', '#pjax-container')
</script>
@endsection

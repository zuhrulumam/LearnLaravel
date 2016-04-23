@extends('admin.layouts.main')
@section('title', 'Posts')


@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{session('message')}}  
</div>

@endif
<div class="graphs">
    <h3 class="blank1">All Posts</h3>
    @if($trashed_item > 0 )
    <a class="btn btn-success btn-sm" href="{!! action('admin\BlogController@getTrashed') !!}">
        <span class="lnr lnr-trash"></span> Get Trashed ({{ $trashed_item }})
    </a>
    @endif

    @if($posts->isEmpty())
    There is no post yet !! 
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="blog-table">
            <thead>
                <tr>
                    <th >Title</th>
                    <th >Content</th>
                    <th>Created by</th>
                    <th >Categories</th>
                    <th >Featured Image</th>
                    <th >Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    @endif

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
                    <form method="post" action="#" class="modal-form">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                    
                        {!! csrf_field() !!}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{!! action('admin\BlogController@getCreate') !!}" class="btn btn-block btn-primary">Create Post</a>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var slug = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Delete  ' + slug);
        modal.find('.modal-text').text('Are you sure to delete post with slug   ' + slug);
        var action = "{!! action('admin\BlogController@postDelete', ['slug'=>'slug']) !!}";
        action = action.replace('slug', slug);
        modal.find('.modal-form').attr('action', action);
    });</script>

<script>
//    $(document).pjax('a', '#pjax-container')
</script>

<script>
    $(function () {
        $('#blog-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action("admin\BlogController@allPost") !!}',
            columns: [
                {data: 'blog_title', name: 'blog_title'},
                {data: 'blog_content', name: 'blog_content'},
                {data: 'blog_created_by', name: 'blog_created_by'},
                {data: 'categories', name: 'categories'},
                {data: 'blog_featured_image', name: 'blog_featured_image'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush

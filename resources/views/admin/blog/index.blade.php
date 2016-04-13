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

    @if($posts->isEmpty())
    There is no post yet !! 
    @else
    <table class="ui selectable inverted table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Created by</th>
                <th>Categories</th>
                <th>Featured Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td><a href="{!! action('admin\BlogController@getReadPost', ['slug'=>$post->slug]) !!}">{{ $post->blog_title }}</a></td>
                <td>{{ $post->blog_content }}</td>
                <td>{{ $post->blog_created_by }}</td>
                <td>
                    @foreach($post->categories as $category)
                    {{ $category->category_name }},
                    @endforeach
                </td>
                <td>{{ $post->blog_featured_image }}</td>
                <td class="selectable">
                    <a class="btn btn-success btn-lg" href="{!! action('admin\BlogController@getEditPost', ['slug'=>$post->slug]) !!}">
                        <span class="lnr lnr-pencil"></span> Edit
                    </a>                    
                    <a data-id="{{ $post->slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                        <span class="lnr lnr-trash"></span> Delete
                    </a>


                </td>
            </tr>        
            @endforeach
        </tbody>
    </table>
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

@section('js')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);// Button that triggered the modal
        var slug = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Delete  ' + slug);
        modal.find('.modal-text').text('Are you sure to delete post with slug   ' + slug);

        var action = "{!! action('admin\BlogController@postDelete', ['slug'=>'slug']) !!}";
        action = action.replace('slug', slug);

        modal.find('.modal-form').attr('action', action);
    });
</script>

<script>
    $(document).pjax('a', '#pjax-container')
</script>
@endsection

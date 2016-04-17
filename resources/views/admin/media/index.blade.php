@extends('admin.layouts.main')
@section('title', 'Media')

@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{ session('message') }}  
</div>

@endif
<div class="graphs">


    <h3 class="blank1">All Media</h3>

    @if($media->isEmpty())
    There is no media yet !! 
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Media Slug</th>
                    <th>Media Name</th>
                    <th>Media Description</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($media as $image)
                <tr>
                    <td>
                        <a href="{!! action('admin\MediaController@read', ['slug'=>$image->media_slug]) !!}">{{ $image->media_slug }}</a>
                    </td>
                    <td>{{ $image->media_name }}</td>
                    <td>{{ $image->media_description }}</td>
                    <td>{{ date("d F Y", strtotime($image->created_at)) }}</td>              
                    <td class="selectable">
                        <a class="btn btn-success btn-lg" href="{!! action('admin\MediaController@getEdit', ['slug'=>$image->media_slug]) !!}">
                            <span class="lnr lnr-pencil"></span> Edit
                        </a>                    
                        <a data-id="{{ $image->media_slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                            <span class="lnr lnr-trash"></span> Delete
                        </a>
                    </td>
                </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <a href="{!! action('admin\MediaController@getCreate') !!}" class="btn btn-block btn-primary">Add Media</a>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Media</h4>
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
        modal.find('.modal-text').text('Are you sure to delete media with slug   ' + slug);

        var action = "{!! action('admin\MediaController@postDelete', ['slug'=>'slug']) !!}";
        action = action.replace('slug', slug);

        modal.find('.modal-form').attr('action', action);
    });
</script>


<script>
    $(document).pjax('a', '#pjax-container')
</script>
@endsection

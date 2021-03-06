@extends('admin.layouts.main')
@section('title', 'Media Trashed')

@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{ session('message') }}  
</div>

@endif
<div class="graphs">


    <h3 class="blank1">All Trashed Media</h3>

    @if($media->isEmpty())
    There is no trashed media yet !! 
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
                        <img src="{!! asset('images/upload/thumb_'.$image->media_name) !!}" class="img-responsive center-block"> 
                    </td>
                    <td>{{ $image->media_name }}</td>
                    <td>{{ $image->media_description }}</td>
                    <td>{{ date("d F Y", strtotime($image->created_at)) }}</td>              
                    <td class="selectable">
                       
                        <form method="post" action="{!! action('admin\MediaController@postRestore', ['slug'=>$image->media_slug]) !!}">                  
                            {!! csrf_field() !!}
                            <button class="btn btn-warning btn-sm" type="submit">
                                <span class="lnr lnr-undo"></span> Restore
                            </button>
                        </form>                                           
                        <a data-id="{{ $image->media_slug }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                            <span class="lnr lnr-cross"></span> Delete
                        </a>                                        
                        
                    </td>
                </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

   
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

@push('js')
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
    $(document).pjax('a', '#pjax-container');
</script>
@endpush

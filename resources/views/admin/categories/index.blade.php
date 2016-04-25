@extends('admin.layouts.main')
@section('title', 'Categories')

@section('content')
@if(session('message'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success !</strong> {{ session('message') }}  
</div>

@endif
<div class="graphs">


    <h3 class="blank1">All Categories</h3>

    @if($categories->isEmpty())
    There is no category yet !! 
    @else
    <div class="table-responsive">

        <table class="table table-bordered table-hover" id="categories-table">
            <thead>
                <tr>
                    <th>Category Slug</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
    @endif

    <a href="{!! action('admin\CategoriesController@getCreate') !!}" class="btn btn-block btn-primary">Add Category</a>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
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
        modal.find('.modal-text').text('Are you sure to delete category with slug   ' + slug);

        var action = "{!! action('admin\CategoriesController@postDelete', ['slug'=>'slug']) !!}";
        action = action.replace('slug', slug);

        modal.find('.modal-form').attr('action', action);
    });
</script>


<script>
    $(document).pjax('a', '#pjax-container')
</script>
<script src="{!! asset('js/datatables/datatables.min.js') !!}"></script>
<script>
    $(function () {
        $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action("admin\CategoriesController@getAllData") !!}',
            columns: [
                {data: 'category_slug'},
                {data: 'category_name', name: 'category_name'},
                {data: 'category_description', name: 'category_description'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush

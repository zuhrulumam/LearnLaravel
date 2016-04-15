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

    {{
GridRender::setGridId("myFirstGrid")
  ->enableFilterToolbar()
  ->setGridOption('url',URL::to('/grid-data'))
  ->setGridOption('rowNum', 5)
  ->setGridOption('shrinkToFit',false)
  ->setGridOption('sortname','id')
  ->setGridOption('caption','Laravel 4 jqGrid package demo')
  ->setGridOption('useColSpanStyle', true)
  ->setNavigatorOptions('navigator', array('viewtext'=>'view'))
  ->setNavigatorOptions('view',array('closeOnEscape'=>false))
  ->setFilterToolbarOptions(array('autosearch'=>true))
  ->setGridEvent('gridComplete', 'gridCompleteEvent') //gridCompleteEvent must be previously declared as a javascript function.
  ->setNavigatorEvent('view', 'beforeShowForm', 'function(){alert("Before show form");}')
  ->setFilterToolbarEvent('beforeSearch', 'function(){alert("Before search event");}')
  ->addGroupHeader(array('startColumnName' => 'amount', 'numberOfColumns' => 3, 'titleText' => 'Price'))
  ->addColumn(array('index'=>'id', 'width'=>55))
  ->addColumn(array('label'=>'Product','index'=>'product','width'=>100))
  ->addColumn(array('label'=>'Amount','index'=>'amount','index'=>'amount', 'width'=>80, 'align'=>'right'))
  ->addColumn(array('label'=>'Total','index'=>'total','index'=>'total', 'width'=>80))
  ->addColumn(array('label'=>'Note','index'=>'note','index'=>'note', 'width'=>55,'searchoptions'=>array('attr'=>array('title'=>'Note title'))))
  ->renderGrid()
    }}

    <h3 class="blank1">All Categories</h3>

    @if($categories->isEmpty())
    There is no category yet !! 
    @else
    <table class="ui selectable inverted table">
        <thead>
            <tr>
                <th>Category Slug</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                    <a href="{!! action('admin\CategoriesController@read', ['slug'=>$category->category_slug]) !!}">{{ $category->category_slug }}</a>
                </td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description }}</td>
                <td>{{ date("d F Y", strtotime($category->created_at)) }}</td>              
                <td class="selectable">
                    <a class="btn btn-success btn-lg" href="{!! action('admin\CategoriesController@getEdit', ['slug'=>$category->category_slug]) !!}">
                        <span class="lnr lnr-pencil"></span> Edit
                    </a>                    
                    <a data-id="{{ $category->category_slug }}" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                        <span class="lnr lnr-trash"></span> Delete
                    </a>
                </td>
            </tr>        
            @endforeach
        </tbody>
    </table>
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

@section('js')
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
@endsection

@extends("layouts.app")
@section("title","Item")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/item/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>SKU</th>
                        <th>Item Name</th>
                        <th>Alias</th>
                        <th>Description</th>
                        <th>Tipe</th>
                        <th>Minimum</th>
                        <th>Stock</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
    	 var dTable=$("#dtable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: `${base_url()}/api/item/list`,
            columns: [
            {
                data: 'item_image',
                name: 'item_image',
                render: function (data, type, row, meta){
                    return `<a href="{{url('/file/view?f=')}}${row.item_image}" class="lightbox-image" rel="1"><img src="{{url('/file/view?f=')}}${row.item_image}" width="64px" class="img-thumbnail"/></a>`;
                }
            },
            {
                data: 'code',
                name: 'code',
                orderable: true,
                searchable: true,
            },
             {
                data: 'item_name',
                name: 'item_name',
                orderable: true,
                searchable: true,
            },
             {
                data: 'item_alias',
                name: 'item_alias',
                orderable: true,
                searchable: true,
            },
            {
                data: 'description',
                name: 'description',
                orderable: true,
                searchable: true,
            },
            {
                data: 'is_variant',
                name: 'is_variant',
                orderable: true,
                searchable: true,
                render:function( data, type, row, meta ){
                    if(data==2)
                        return "Varian";
                    else if(data==1)
                        return "Template";
                    else
                        return "Single";
                }
            },
             {
                data: 'minimum_stock',
                name: 'minimum_stock',
                orderable: true,
                searchable: true,
            },
             {
                data: 'current_stock',
                name: 'current_stock',
                orderable: true,
                searchable: true,
            },
            {
                data: 'action',
                orderable: false,
                searchable: false,
            }],
            drawCallback:function(){
                $_ui();
            }
    	 });
    });
</script>
@endpush

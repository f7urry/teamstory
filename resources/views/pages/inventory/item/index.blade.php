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
                        <th>Uom</th>
                        <th>Group</th>
                        <th>Tipe</th>
                        <th>Price</th>
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
        var url=`${base_url()}/api/item/list?`;
        if("{{request()->input('group')}}"!=null){
            url+="group={{request()->input('group')}}";
        }
    	var dTable=$("#dtable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: url,
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
                data: 'uom.name',
                name: 'uom.name',
                orderable: true,
                searchable: true,
            },
            {
                data: 'group.group_name',
                name: 'group.group_name',
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
                className: 'text-right',
                data: 'sell_price',
                name: 'sell_price',
                orderable: true,
                searchable: true,
            },
            {
                className: 'text-right',
                orderable: true,
                searchable: true,
                render: function (data, type, row, meta) {
                    return row['current_stock']+"<br/><br/><small>Minimum: "+row['minimum_stock']+"</small>";
                }
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

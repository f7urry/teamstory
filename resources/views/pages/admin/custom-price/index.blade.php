<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <a class="btn btn-primary mb-2" id="btn_add" href="{{url('/customprice/create/'.$party->id)}}"><i class="fa fa-plus"></i> Add Item</a>
            <table class="table table-bordered table-hover table-striped" id="dtable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Item</th>
                    	<th>Price</th>
                    	<th>Disc(%)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="pull-right"></div>
        </div>
    </div>
</div>

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
    	 var dTable=$("#dtable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: `${base_url()}/api/customprice/list?id={{$party->id}}`,
            columns: [
            {
                data: 'item.item_name',
                name: 'item.item_name',
                orderable: true,
                searchable: true,
            },
            {
                data: 'price',
                name: 'price',
                orderable: true,
                searchable: true,
                render: function(data){
                    return number_format(data);
                }
            },
            {
                data: 'discount',
                name: 'discount',
                orderable: true,
                searchable: true,
                render: function(data){
                    return number_format(data);
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

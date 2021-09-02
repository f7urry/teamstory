<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <a class="btn btn-primary mb-2" id="btn_add" href="{{url('/address/create/'.$party->id)}}"><i class="fa fa-plus"></i> Add Address</a>
            <table class="table table-bordered table-hover table-striped" id="addressTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>PIC</th>
                    	<th>Address</th>
                    	<th>City</th>
                    	<th>Province</th>
                    	<th>Phone</th>
                    	<th>Email</th>
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
    	 var dTable=$("#addressTable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: `${base_url()}/api/address/list?id={{$party->id}}`,
            columns: [
            {
                data: 'pic_name',
                name: 'pic_name',
                orderable: true,
                searchable: true,
            },
            {
                data: 'address',
                name: 'address',
                orderable: true,
                searchable: true,
            },
            {
                data: 'city.location',
                name: 'city.location',
                orderable: true,
                searchable: true,
            },
            {
                data: 'province.location',
                name: 'province.location',
                orderable: true,
                searchable: true,
            },
            {
                data: 'phone',
                name: 'phone',
                orderable: true,
                searchable: true,
            },
            {
                data: 'email',
                name: 'email',
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

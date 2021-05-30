@extends("layouts.app")
@section("title","Receivable")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/receivable/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>
<div class="card  mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Sales Order</th>
                        <th>Amount</th>
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
             order:[[1,"DESC"]],
             ajax: `${base_url()}/api/receivable/list`,
             columns: [
                {
                    data: 'code',
                    name: 'code',
                    orderable: false,
                    searchable: true,
                },
            	{
                    data: 'date',
                    name: 'date',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'salesorder.code',
                    name: 'salesorder.code',
                    orderable: false,
                    searchable: true,
                },
                {
                    data: 'amount',
                    name: 'amount',
                    orderable: false,
                    searchable: true,
                    render: function(data,row){
                        return "Rp"+number_format(data);
                    }
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                }
             ],
             drawCallback:function(){
                 $_ui();
             }
    	 });
    });
</script>
@endpush

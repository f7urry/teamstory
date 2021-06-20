@extends("layouts.app")
@section("title","Sales Order")
@section("content")
@if(Gate::check('is_create'))
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/salesorder/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dtable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Date</th>
                    	<th>Code</th>
                    	<th>Customer</th>
                    	<th>Amount</th>
                    	<th>Status</th>
                    	<th>Invoice</th>
                    	<th>Payment Status</th>
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
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
    	 var dTable=$("#dtable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: `${base_url()}/api/salesorder/list`,
            columns: [
            {
                data: 'date',
                name: 'date',
                orderable: true,
                searchable: true,
            },
            {
                data: 'code',
                name: 'code',
                orderable: true,
                searchable: true,
            },
            {
                data: 'party.party_name',
                name: 'party.party_name',
                orderable: true,
                searchable: true,
            },
            {
                data: 'amount',
                name: 'amount',
                orderable: true,
                searchable: true,
            },
            {
                data: 'status',
                name: 'status',
                orderable: true,
                searchable: true,
            },
            {
                data: 'invoice_code',
                name: 'invoice_code',
                orderable: true,
                searchable: true,
            },
            {
                data: 'status',
                name: 'status',
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

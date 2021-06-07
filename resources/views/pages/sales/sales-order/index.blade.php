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
                    	<th>Code</th>
                    	<th>Date</th>
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
                data: 'code',
                name: 'code',
                orderable: true,
                searchable: true,
            },
            {
                data: 'date',
                name: 'date',
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

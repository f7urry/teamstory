@extends("layouts.app")
@section("title","Item Register")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/itemregisters/create')}}"><i class="fa fa-plus"></i> Tambah</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dtable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Code</th>
                    	<th>Tanggal</th>
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
            ajax: `${base_url()}/api/itemregisters/list`,
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

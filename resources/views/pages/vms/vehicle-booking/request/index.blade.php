@extends("layouts.app")
@section("title","Request Booking")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('bookingrequest.create')}}" id="btn_save"><i class="fa fa-plus"></i> New</a></li>
    </ol>
    <div class="table-responsive">
        <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
            <thead class='thead-dark'>
                <tr>
                    <th>Code</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Destination</th>
                    <th>Notes</th>
                    <th>Vehicle Assigned</th>
                    <th>Driver</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
         var dTable=$("#dtable").DataTable({
             searching: true,
             processing: true,
             serverSide: true,
             ajax: `${base_url()}/api/bookingrequest/list`,
             columns: [
                {
                    data: 'code',
                    name: 'code',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'date_from',
                    name: 'date_from',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'date_to',
                    name: 'date_to',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'destination',
                    name: 'destination',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'notes',
                    name: 'notes',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'vehicle_code',
                    name: 'vehicle_code',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'vehicle_driver',
                    name: 'vehicle_driver',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: true,
                },
             ],
             drawCallback:function(){
                $_ui();
             }
         });
    });
</script>
@endpush
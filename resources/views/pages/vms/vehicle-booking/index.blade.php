@extends("layouts.app")
@section("title","Booking")
@section("content")
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('vehiclebookings.create')}}" id="btn_save"><i class="fa fa-plus"></i> New</a></li>
    </ol> -->
    <hr/>
    <div class="table-responsive">
        <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
            <thead class='thead-dark'>
                <tr>
                    <th>Code</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Destination</th>
                    <th>Notes</th>
                    <th>Request By</th>
                    <th>Status</th>
                    <th></th>
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
             ajax: `${base_url()}/api/vehiclebookings/list`,
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
                    data: 'created_by.name',
                    name: 'created_by.name',
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
                    data: 'action'
                }
             ],
             drawCallback:function(){
                $_ui();
             }
         });
    });
</script>
@endpush
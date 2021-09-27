@extends("layouts.app")
@section("title","Dashboard")
@section("content")
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Reported Issue</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class='thead-dark'>
                            <tr>
                                <th>Due Date</th>
                                <th>Project</th>
                                <th>Subject</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
    	 var dTable=$("#dataTable").DataTable({
             searching: true,
             processing: true,
             serverSide: true,
             order:[[1,"DESC"]],
             ajax: `${base_url()}/api/issue/list`,
             columns: [
                {
                    data: 'due_date',
                    name: 'due_date',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'project.project_name',
                    name: 'project.project_name',
                    orderable: true,
                    searchable: true,
                },
            	{
                    data: 'subject',
                    name: 'subject',
                    orderable: true,
                    searchable: true,
                    render: function(data, type, row, meta){
                        return `<a class="text-info" href='${base_url()+'/issue/'+row['id']}'>${data}</a>`;
                    }
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
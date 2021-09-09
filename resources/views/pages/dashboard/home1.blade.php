@extends("layouts.app")
@section("title","Dashboard")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Today Task</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fa fa-clipboard-list ni-active-40"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Due Task</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fa fa-clipboard-list ni-active-40"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-dark">Issue Waiting</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-sm" id="table_waiting" width="100%" cellspacing="0">
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
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-dark">Issue On Progress</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-sm" id="table_progress" width="100%" cellspacing="0">
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
         bind_table("table_waiting", "WAITING");
         bind_table("table_progress", "IN PROGRESS");
    });
    function bind_table(id,status){
        var dTable=$("#"+id).DataTable({
             searching: true,
             processing: true,
             serverSide: true,
             order:[[1,"DESC"]],
             ajax: `${base_url()}/api/issue/list?status=${status}`,
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
    }
</script>
@endpush
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
                                <h5 class="card-title text-uppercase text-muted mb-0">New Issue</h5>
                                <a href="{{url('/issue/create')}}"><i class="fa fa-plus text-dark"></i> <span class="text-dark font-weight-bold mb-0">Create Here</span></a>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fa fa-clipboard-list ni-active-40"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
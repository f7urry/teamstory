@extends("layouts.app")
@section("title","Issue")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/issue/create')}}"><i class="fa fa-plus"></i> New</a></li>
@endsection
@section("content")
<div class="card">
<div class="card-body">
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Code</th>
                    	<th>Project</th>
                    	<th>Due Date</th>
                    	<th>Subject</th>
                    	<th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($list_data)>0)
                        @foreach($list_data as $p)
                        <tr>
                        	<td>{{$p->code}}</td>
                        	<td>{{$p->project->project_name}}</td>
                        	<td>{{$p->due_date}}</td>
                        	<td>{{$p->subject}}</td>
                        	<td>{{$p->status}}</td>
                            <td>
                                <a class='btn btn-warning' href="{{url('/issue/'.$p->id)}}"><i class="fa fa-pen"></i></a>
                                @if(Gate::check("is_delete"))
                                    <a class='btn btn-danger btn-delete' href="#" data-href="{{url('/issue/'.$p->id)}}" data-message="Dou you want delete {{$p->subject}}?"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $("#dataTable").DataTable({drawCallback:function(s){$_ui();}});
</script>
@endpush

@extends("layouts.app")
@section("title","Project")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/project/create')}}"><i class="fa fa-plus"></i> New</a></li>
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
                                <th>Project</th>
                                <th>Company</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($list_data)>0)
                                @foreach($list_data as $p)
                                <tr>
                                    <td>{{$p->project_name}}</td>
                                    <td>{{$p->company->company_name}}</td>
                                    <td>
                                        <a class='btn btn-warning' href="{{url('/project/'.$p->id)}}"><i class="fa fa-pen"></i></a>
                                        <a class='btn btn-danger btn-delete' href="#" data-href="{{url('/project/'.$p->id)}}" data-message="Dou you want delete {{$p->project_name}}?"><i class="fa fa-trash"></i></a>
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

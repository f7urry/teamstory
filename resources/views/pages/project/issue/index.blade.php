@extends("layouts.app")
@section("title","Issue")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/issue/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Project</th>
                    	<th>Subject</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($list_data)>0)
                        @foreach($list_data as $p)
                        <tr>
                        	<td>{{$p->project->project_name}}</td>
                        	<td>{{$p->subject}}</td>
                            <td>
                                <a class='btn btn-warning' href="{{url('/issue/'.$p->id)}}"><i class="fa fa-pen"></i></a>
                                <a class='btn btn-danger btn-delete' href="#" data-href="{{url('/issue/'.$p->id)}}" data-message="Dou you want delete {{$p->subject}}?"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $("#dataTable").DataTable({drawCallback:function(s){$_ui();}});
</script>
@endpush

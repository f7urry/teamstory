@extends("layouts.app")
@section("title","Unit Of Measure")
@section("content")
<ol class="breadcrumb">
    <li><a href="{{url('/uom/create')}}"><i class="fa fa-file"></i> New</a></li>
</ol>
<div class="row mt-2">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Code</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($list_data)>0)
                        @foreach($list_data as $p)
                        <tr>
                        	<td>{{$p->code}}</td>
                            <td>{{$p->name}}</td>
                            <td>
                                <a class='btn btn-default' href="{{url('/uom/'.$p->id)}}"><i class="fa fa-pen"></i></a>
                                <a class='btn btn-danger btn-delete' href="{{url('/uom/'.$p->id)}}" data-message="Do you want delete {{$p->name}}?"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="pull-right">{{ $list_data->appends(request()->except('page'))->links() }}</div>
        </div>
    </div>
</div>
@endsection
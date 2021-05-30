@extends("layouts.app")
@section("title","Item Brand")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/itembrand/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Group Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($list_data)>0)
                        @foreach($list_data as $p)
                        <tr>
                        	<td>{{$p->name}}</td>
                            <td>
                                <a class='btn btn-info' href="{{url('/itembrand/'.$p->id)}}"><i class="fa fa-eye"></i></a>
                                <a class='btn btn-danger btn-delete' href="#" data-href="{{url('/itembrand/'.$p->id)}}" data-message="Dou you want delete {{$p->name}}?"><i class="fa fa-trash"></i></a>
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

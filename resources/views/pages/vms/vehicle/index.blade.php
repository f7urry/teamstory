@extends("layouts.app")
@section("title","Vehicle")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/vehicles/create')}}"><i class="fa fa-plus"></i> Tambah</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>No.Polisi</th>
                    	<th>Model</th>
                    	<th>Brand</th>
                    	<th>Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($list_data)>0)
                        @foreach($list_data as $p)
                        <tr>
                        	<td>{{$p->code}}</td>
                            <td>{{$p->model}}</td>
                            <td>{{$p->brand}}</td>
                            <td>{{$p->color}}</td>
                            <td>
                                <a class='btn btn-info' href="{{url('/vehicles/'.$p->id)}}"><i class="fa fa-eye"></i></a>
                                <a class='btn btn-danger btn-delete' href="{{url('/vehicles/'.$p->id)}}" data-message="Dou you want delete {{$p->code}}?"><i class="fa fa-trash"></i></a>
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
        $(function(){
            $("#dataTable").DataTable();
        });
    </script>
@endpush

@extends('layouts.app')
@section('title', 'Module')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/modules/create')}}"><i class="fa fa-plus"></i> New Group</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Parent</th>
                                <th>Group Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{($d->parent!=null)?$d->parent->name:""}}</td>
                                <td>{{$d->name}}</td>
                                <td>
                                    <a href="{{url('/modules/'.$d->id)}}" class='btn btn-primary mr-2'><i class='fa fa-pen'></i></a>
                                    <a href="{{url('/modules/'.$d->id)}}" class='btn btn-danger btn-delete' data-message='Delete this data?'><i class='fa fa-trash'></i></a>
                                </td>
                            </tr>
                            @endforeach
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
    var dtable=$("#dTable").DataTable();
</script>
@endpush
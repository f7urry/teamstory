@extends('layouts.app')
@section('title', 'Role')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/roles/create')}}"><i class="fa fa-plus"></i> New</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Role Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->name}}</td>
                                <td>
                                    <a href="{{url('/roles/'.$d->id)}}" class='btn btn-primary mr-2'><i class='fa fa-pen'></i></a>
                                    <a href="{{url('/roles/'.$d->id)}}" class='btn btn-delete btn-danger'><i class='fa fa-trash'></i></a>
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
    $_ui();
</script>
@endpush
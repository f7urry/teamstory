@extends('layouts.app')
@section('title', 'Users')
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/users/create')}}"><i class="fa fa-plus"></i> New</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->username}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>
                                    <a href="{{url('/users/'.$d->id)}}" class='btn btn-primary mr-2'><i class='fa fa-pen'></i></a>
                                    <a href="#" data-href="{{url('/users/'.$d->id)}}" class='btn-delete btn btn-danger'><i class='fa fa-trash'></i></a>
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
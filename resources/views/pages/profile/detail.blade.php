@extends("layouts.app")
@section("title","Update Profile")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formUpdate"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <form method="POST" action="{{url('/profile')}}" enctype="multipart/form-data" id="formUpdate">
                    {{ csrf_field()}}
                    {{method_field('patch')}}
                    <input type="hidden" value="{{$user->id}}" name="id"/>

                    <div class="row">
                        <div class="col-md-4">
                            @if($user->avatar!=null)
                                <img src="{{url('/file/view?f='.$user->avatar)}}" class="img-rounded img-thumbnail" width="256px"/>
                            @endif
                            <input id="file" type="file" class="form-control" name="avatar" style="width:256px"/>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password (<small>need password for update</small>)</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <a href="{{url('/profile/changepass')}}">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

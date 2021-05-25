@extends("layouts.app")
@section("title","Change Password")
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/profile')}}"><i class="fa fa-arrow-left"></i> Kembali</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formUpdate"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card shadow">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ url('/profile/changepass') }}" id="formUpdate">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Old Password</label>

                        <div class="col-md-6">
                            <input id="oldpassword" type="password" class="form-control" name="oldpassword" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

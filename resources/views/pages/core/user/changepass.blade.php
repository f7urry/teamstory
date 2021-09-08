@extends("layouts.app")
@section("title","Change Password")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/users/'.$user->id)}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" id="btn-update"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card shadow">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ url('/users/'.$user->id.'/changepass') }}" id="formUpdate">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">New Password</label>

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

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-update").on("click",function(){
            $("#formUpdate").submit();
        });
    });
</script>
@endpush
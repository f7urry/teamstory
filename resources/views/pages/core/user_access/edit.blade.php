@extends('layouts.app')
@section('title', 'User Edit')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-save"></i> Save</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <form name='frmUser' method="POST" action="{{route('users.update', ['user' => $user->id])}}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group form-control-md row">
                        <label for="level" class="col-md-2 col-form-label text-md-right">{{ __('Role') }}</label>
                        <div class="col-md-4">
                            <select id="level" class="form-control" name="role" {{ isset($user)?'disabled':''}}>
                                <option value="ROLE_ADMIN" {{ isset($user) ? ($user->role=='ROLE_ADMIN'?'selected':'') : '' }}>Admin</option>
                                <option value="ROLE_USER" {{ isset($user) ? ($user->role=='ROLE_USER'?'selected':'') : '' }}>User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" id="jde_code" name="jde_code" value="{{$user->jde_code}}" class="form-control col-md-3" placeholder="JDE Code" readonly/>
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name" value="{{$user->name}}" readonly/>
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="popup-code"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-4">
                            <input id="username" type="text" class="form-control" name="username" autocomplete="username" placeholder="Username" value="{{$user->username}}"/>
                        </div>
                    </div>

                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-4">
                            <input id="email" type="text" class="form-control" name="email" autocomplete="email" placeholder="Email" value="{{$user->email}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <a href="{{url('/users/'.$user->id.'/changepass')}}">Change Password</a>
                        </div>
                    </div>
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Allowance Percentage(%)') }}</label>
                        <div class="col-md-4">
                            <input id="allowance_percentage" type="number" class="form-control" name="allowance_percentage" placeholder="%" value="{{$user->allowance_percentage}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push("scripts")
    <script type="text/javascript">
        var popup_click = function(opt) {
            _popup_click(opt);
            $("#jde_code").val(opt.value);
            $("#name").val(opt.text);
        };
    
        $(document).ready(function(){
            $("#popup-code").click(function(){
                openPopup("jde_code",base_url()+"/users/popupjde?");
            });
        });
    </script>
@endpush
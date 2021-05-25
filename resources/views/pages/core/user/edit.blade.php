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
                    @method('patch')
                    @csrf
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name" value="{{$user->name}}"/>
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
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header bg-dark text-white">Role Permission</div>
                <div class="card-body">
                    <button class="btn btn-primary" type="button" id="btn_add_role"><i class="fa fa-plus"></i>&nbsp;Add Role</button>
                    <table class="table table-border border mt-2" id="table_role">
                        <thead class="thead-light">
                            <tr>
                                <th>Role Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->roles as $role)
                                <tr>
                                    <td>
                                        <div class="form-inline row">
                                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#'"><i class='fa fa-minus'></i></a></div>
                                            <div class="col-md-3">
                                                <input type="hidden" name="role_ids[]" value="{{$role->id}}"/>
                                                <select name='roles[]' class='role_picker'>
                                                    <option value="{{$role->roleaccess->id}}">{{$role->roleaccess->name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

@push("scripts")
    <script type="text/javascript">
        var popup_click = function(opt) {
            _popup_click(opt);
            $("#jde_code").val(opt.value);
            $("#name").val(opt.text);
        };
    
        $(function(){
            $("#popup-code").on("click",function(){
                openPopup("jde_code",base_url()+"/users/popupjde?");
            });

            var url=base_url()+"/api/roles/options";
            var roleIdx=0;
            $("#btn_add_role").on("click",function(){
                var e=`
                <tr>
                    <td>
                        <div class="form-inline row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#'"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-3">
                                <input type="hidden" name="role_ids[]" value="0"/>
                                <select name='roles[]' class='role_picker'></select>
                            </div>
                        </div>
                    </td>
                </tr>`;
                $("#table_role tbody").append(e);
                
                roleIdx++;
                $_select(".role_picker",url);
                $_ui();
            });
            $_select(".role_picker",url);
            $_ui();
        });
    </script>
@endpush
@extends('layouts.app')
@section('title', 'User Add')
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/users')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-save"></i> Save</a></li>
@endsection
@section('content')
<form name='frmUser' method="POST" action="{{url('/users')}}" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">User Information</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-4">
                            <input id="username" type="text" class="form-control" name="username" autocomplete="username" placeholder="Username"/>
                        </div>
                    </div>

                        <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-4">
                            <input id="email" type="text" class="form-control" name="email" autocomplete="username" placeholder="Email"/>
                        </div>
                    </div>
                    
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control" name="password"/>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">Company Permission</div>
                <div class="card-body">
                    <button class="btn btn-primary" type="button" id="btn_add_company"><i class="fa fa-plus"></i>&nbsp;Add Company</button>
                    <table class="table table-border border mt-2" id="table_company">
                        <thead class="thead-light">
                            <tr>
                                <th>Company</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

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
            __bind_add_role();
            __bind_add_company();
        });

        function __bind_add_role(){
            var roleIdx=0;
            $("#btn_add_role").on("click",function(){
                var e=`
                <tr id='role_${roleIdx}'>
                    <td>
                        <div class="form-inline row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' target="#role_${roleIdx}"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-6">
                                <select name='roles[]' class='role_picker'></select>
                            </div>
                        </div>
                    </td>
                </tr>`;
                $("#table_role tbody").append(e);
                
                var url=base_url()+"/api/roles/options";
                roleIdx++;
                $_select(".role_picker",url);
                $_ui();
            });
        }

        function __bind_add_company(){
            var companyIdx=0;
            $("#btn_add_company").on("click",function(){
                var e=`
                <tr id='company_${companyIdx}'>
                    <td>
                        <div class="form-inline row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' target="#company_${companyIdx}"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-6">
                                <select name='companies[]' class='company_picker'></select>
                            </div>
                        </div>
                    </td>
                </tr>`;
                $("#table_company tbody").append(e);
            
                var url=base_url()+"/api/company/options";
                companyIdx++;
                $_select(".company_picker",url);
                $_ui();
            });
        }
    </script>
@endpush
@extends('layouts.app')
@section('title', 'Edit Role')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/roles')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-check"></i> Update</a></li>
</ol>
<form name='frmUser' method="POST" action="{{url('/roles/'.$role->id)}}" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white">Role Information</div>
            <div class="card-body">
                {{csrf_field()}}
                {{method_field("patch")}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name" value="{{$role->name}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header bg-dark text-white">Module List</div>
            <div class="card-body">
                <button class="btn btn-primary" type="button" id="btn_add_role"><i class="fa fa-plus"></i>&nbsp;Add Module</button>
                <table class="table table-border border mt-2" id="table_role">
                    <thead class="thead-light">
                        <tr>
                            <th>Module Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role->permissions as $permit)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' target="#role_${roleIdx}"><i class='fa fa-minus'></i></a></div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="permission_id[]" value="{{$permit->id}}"/>
                                        <select name='module_id[]' class='role_picker col-md-3'>
                                            <option value="{{$permit->module_id}}">{{$permit->module->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="is_read[]" value="{{$permit->is_read}}"/><input type="checkbox" {{$permit->is_read==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Read
                                        <input type="hidden" name="is_create[]" value="{{$permit->is_create}}"/><input type="checkbox" {{$permit->is_create==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Create
                                        <input type="hidden" name="is_update[]" value="{{$permit->is_update}}"/><input type="checkbox" {{$permit->is_update==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Update
                                        <input type="hidden" name="is_delete[]" value="{{$permit->is_delete}}"/><input type="checkbox" {{$permit->is_delete==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Delete
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
        $(function(){
            var url=base_url()+"/api/modules/options";
            var roleIdx=0;
            $("#btn_add_role").on("click",function(){
                var e=`
                <tr id='role_${roleIdx}'>
                    <td>
                        <div class="row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' target="#role_${roleIdx}"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-3">
                                <input type="hidden" name="permission_id[]" value="0"/>
                                <select name='module_id[]' class='role_picker col-md-3'></select>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="is_read[]" value="0"/><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Read
                                <input type="hidden" name="is_create[]" value="0"/><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Create
                                <input type="hidden" name="is_update[]" value="0"/><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Update
                                <input type="hidden" name="is_delete[]" value="0"/><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Delete
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
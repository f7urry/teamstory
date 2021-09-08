@extends('layouts.app')
@section('title', 'Edit Role')
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/roles')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section('content')
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
                        <div class="form-group">
                            <label>{{ __('Access Type') }}</label>
                            <input id="access_type" type="number" class="form-control" name="access_type" value="{{$role->access_type}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header bg-dark text-white">Module List</div>
            <div class="card-body">
                <button class="btn btn-primary btn_add_role" type="button"><i class="fa fa-plus"></i>&nbsp;Add Module</button>
                <table class="table table-border border mt-2" id="table_role">
                    <thead class="thead-light">
                        <tr>
                            <th>Module Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($idx=0)
                        @foreach($role->permissions as $i=>$permit)
                        <tr id="role_{{$i}}">
                            <td>
                                <div class="row">
                                    <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' data-target="#role_{{$i}}"><i class='fa fa-minus'></i></a></div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="permission_id[]" value="{{$permit->id}}"/>
                                        <select name='module_id[]' class='role_picker col-md-3'>
                                            <option value="{{$permit->module_id}}">{{$permit->module->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="checkbox" class="chk_all" data-index="{{$i}}"/> All
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="is_read[]" value="{{$permit->is_read}}"/><input id="chk_read_{{$i}}" type="checkbox" {{$permit->is_read==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Read
                                        <input type="hidden" name="is_create[]" value="{{$permit->is_create}}"/><input id="chk_create_{{$i}}" type="checkbox" {{$permit->is_create==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Create
                                        <input type="hidden" name="is_update[]" value="{{$permit->is_update}}"/><input id="chk_update_{{$i}}" type="checkbox" {{$permit->is_update==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Update
                                        <input type="hidden" name="is_delete[]" value="{{$permit->is_delete}}"/><input id="chk_delete_{{$i}}" type="checkbox" {{$permit->is_delete==1?"checked":""}} onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Delete
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php($idx=$i)
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary btn_add_role" type="button"><i class="fa fa-plus"></i>&nbsp;Add Module</button>
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
            var roleIdx="{{$idx+1}}";
            $(".btn_add_role").on("click",function(){
                var e=`
                <tr id='role_${roleIdx}'>
                    <td>
                        <div class="row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' data-target="#role_${roleIdx}"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-3">
                                <input type="hidden" name="permission_id[]" value="0"/>
                                <select name='module_id[]' class='role_picker col-md-3'></select>
                            </div>
                            <div class="col-md-1">
                                <input type="checkbox" class="chk_all" data-index="${roleIdx}"/> All
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="is_read[]" value="0"/><input   id="chk_read_${roleIdx}"  type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Read
                                <input type="hidden" name="is_create[]" value="0"/><input id="chk_create_${roleIdx}" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Create
                                <input type="hidden" name="is_update[]" value="0"/><input id="chk_update_${roleIdx}" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Update
                                <input type="hidden" name="is_delete[]" value="0"/><input id="chk_delete_${roleIdx}" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"/>&nbsp;Delete
                            </div>
                        </div>
                    </td>
                </tr>`;
                $("#table_role tbody").append(e);
                
                roleIdx++;
                $_select(".role_picker",url);
                $_bind_checkall();
                $_ui();
            });
            $_select(".role_picker",url);
            $_bind_checkall();
            $_ui();
        });
        function $_bind_checkall(){
            $(".chk_all").on("click",function(e){
                let index=$(this).attr("data-index");
                $("#chk_read_"+index).click();
                $("#chk_create_"+index).click();
                $("#chk_update_"+index).click();
                $("#chk_delete_"+index).click();
            });
        }
    </script>
@endpush
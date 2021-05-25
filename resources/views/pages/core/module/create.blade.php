@extends('layouts.app')
@section('title', 'New Role')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/roles')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-save"></i> Save</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <form name='frmUser' method="POST" action="{{url('/roles')}}" enctype="multipart/form-data">
            <div class="card">
                 <div class="card-header bg-dark text-white">Role Information</div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name"/>
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
        $(function(){
            var roleIdx=0;
            $("#btn_add_role").on("click",function(){
                var e=`
                <tr id='role_${roleIdx}'>
                    <td>
                        <div class="row">
                            <div class="col-md-1"><a class='btn btn-remove-row btn-danger rounded-circle' href='#' target="#role_${roleIdx}"><i class='fa fa-minus'></i></a></div>
                            <div class="col-md-3">
                                <select name='modules[]' class='role_picker col-md-3'></select>
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
                
                var url=base_url()+"/api/modules/options";
                roleIdx++;
                $_select(".role_picker",url);
                $_ui();
            });
        });
    </script>
@endpush
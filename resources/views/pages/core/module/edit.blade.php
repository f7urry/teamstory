@extends('layouts.app')
@section('title', 'Edit Module Group')
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/modules')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section('content')
<form name='frmUser' method="POST" action="{{url('/modules/'.$group->id)}}" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-12">
        {{csrf_field()}}
        {{method_field("patch")}}
        @if($group->name!="ROOT")
            <div class="card">
                <div class="card-header bg-dark text-white">Module Group Information</div>
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$group->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Parent') }}</label>
                            <select name="parent_id" class="form-control">
                                <option value="">--ROOT--</option>
                                @foreach($parents as $parent)
                                    <option value="{{$parent->id}}" {{$group->parent_id==$parent->id?'selected':''}}>{{$parent->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Icon') }}</label>
                            <input id="icon" type="text" class="form-control" name="fa_icon" value="{{$group->fa_icon}}"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Menu Index') }}</label>
                            <input id="menu_index" type="text" class="form-control" name="menu_index" value="{{$group->menu_index}}"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Show Menu') }}</label>
                            <select name="is_menu" class="form-control">
                                <option value="0" {{$group->is_menu==0?"selected":""}}>Hide</option>
                                <option value="1" {{$group->is_menu==1?"selected":""}}>Show</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card mt-2">
            <div class="card-header bg-dark text-white">Module List</div>
            <div class="card-body">
                <button class="btn btn-primary" type="button" id="btn_add_module"><i class="fa fa-plus"></i>&nbsp;Add Module</button>
                <table class="table table-border border mt-2" id="table_module">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Index</th>
                            <th>Icon</th>
                            <th>Module Name</th>
                            <th>Path</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($idx=0) @foreach($group->modules as $i=>$module)
                        <tr id="m_{{$i}}">
                            <td><a class='btn btn-remove-row btn-danger rounded-circle' href='#' data-target="#m_{{$i}}"><i class='fa fa-minus'></i></a></td>
                            <td><input type="text" name="module_index[]" class="form-control" value="{{$module->menu_index}}"/></td>
                            <td><input type="text" name="module_icon[]" class="form-control" value="{{$module->fa_icon}}"/></td>
                            <td>
                                <input type="hidden" name="module_id[]" value="{{$module->id}}"/>
                                <input type="text" name="module_name[]" class="form-control" value="{{$module->name}}"/> 
                            </td>
                            <td><input type="text" name="module_path[]" class="form-control" value="{{$module->path}}"/></td>
                            <td>
                                <select name="module_menu[]" class="form-control">
                                    <option value="0" {{$module->is_menu==0?'selected':''}}>Hide</option>
                                    <option value="1" {{$module->is_menu==1?'selected':''}}>Show</option>
                                </select>
                            </td>
                        </tr>
                        @php($idx=$i) @endforeach
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
            var m_idx="{{$idx+1}}";
            $("#btn_add_module").on("click",function(){
                var e=`
                <tr id='m_${m_idx}'>
                    <td><a class='btn btn-remove-row btn-danger rounded-circle' href='#' data-target="#m_${m_idx}"><i class='fa fa-minus'></i></a></td>
                    <td><input type="text" name="module_index[]" class="form-control" value="0"/></td>
                    <td><input type="text" name="module_icon[]" class="form-control" value="fa-circle"/></td>
                    <td>
                        <input type="hidden" name="module_id[]" value="0"/>
                        <input type="text" name="module_name[]" class="form-control" value=""/> 
                    </td>
                    <td><input type="text" name="module_path[]" class="form-control" value=""/></td>
                    <td>
                        <select name="module_menu[]" class="form-control">
                            <option value="0">Hide</option>
                            <option value="1">Show</option>
                        </select>
                    </td>
                </tr>`;
                $("#table_module tbody").append(e);
                $_ui();
                m_idx++;
            });
        });
    </script>
@endpush
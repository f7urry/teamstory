@extends("layouts.app")
@section("title","Item Group")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/itemgroup')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/itemgroup/'.$item->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label onclick="javascript:alert('alert');">Item Group</label>
                        <input type="text" name="group_name" class="form-control" id="name" value="{{$item->group_name}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

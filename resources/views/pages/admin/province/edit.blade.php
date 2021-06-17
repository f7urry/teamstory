@extends("layouts.app")
@section("title","Province")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/province')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/province/'.$province->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label onclick="javascript:alert('alert');">Province</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{$province->location}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

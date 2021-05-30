@extends("layouts.app")
@section("title","Item Brand")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/itembrand')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/itembrand/'.$item->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label onclick="javascript:alert('alert');">Item Brand</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$item->name}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

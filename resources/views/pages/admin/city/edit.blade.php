@extends("layouts.app")
@section("title","City")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/city')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/city/'.$city->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label>Province</label>
                        <select name="parent_id" id="province">
                            <option value="{{$city->parent_id}}">{{$city->parent->location}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label onclick="javascript:alert('alert');">Province</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{$city->location}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $_select("#province", base_url()+"/api/province/options");
</script>
@endpush
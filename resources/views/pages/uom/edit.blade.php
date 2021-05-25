@extends("layouts.app")
@section("title","Unit Of Measure")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/uom')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);" id="btn_save"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Edit Data</div>
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-10">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" id="code_uom" value="{{$uom->code}}" />
                    </div>
                    <div class="form-group col-md-10">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="name_uom" value="{{$uom->name}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $("#btn_save").click(function() {
        document.formAdd.action = "{{url('/uom/'.$uom->id)}}";
        document.formAdd.submit();
    });

</script>
@endpush

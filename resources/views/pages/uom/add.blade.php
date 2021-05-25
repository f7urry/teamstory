@extends("layouts.app")
@section("title","Unit Of Measure")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/uom')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);" id="btn_save"><i class="fa fa-file"></i> Save</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Create New</div>
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" action="javascript:save()">
                    {{ csrf_field() }}
                    <div class="form-group col-md-10">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" id="code_uom" />
                    </div>
                    <div class="form-group col-md-10">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="name_uom" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $("#btn_save").click(save);

    function save() {
        document.formAdd.action = "{{url('/')}}/uom";
        document.formAdd.submit();
    }

</script>
@endpush

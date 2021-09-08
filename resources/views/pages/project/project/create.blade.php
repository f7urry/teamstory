@extends("layouts.app")
@section("title","Project")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/project')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/project')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Company</label>
                            <select name="company_id" id="company"></select>
                        </div>
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="project_name" class="form-control" id="name" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
<script type="text/javascript">
    $_select("#company", base_url()+"/api/company/options");
</script>
@endpush
@extends("layouts.app")
@section("title","Project")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/project')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/project/'.$project->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label>Company</label>
                        <select name="company_id" id="company">
                            <option value="{{$project->company_id}}">{{$project->company->company_name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Project Name</label>
                        <input type="text" name="project_name" class="form-control" id="project_name" value="{{$project->project_name}}" />
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
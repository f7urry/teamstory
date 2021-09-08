@extends("layouts.app")
@section("title","Company")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/company')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/company/'.$company->id)}}"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section("content")
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label>Company</label>
                        <input type="text" name="company_name" class="form-control" id="company_name" value="{{$company->company_name}}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <input type="text" name="company_address" class="form-control" id="company_address" value="{{$company->company_address}}" />
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
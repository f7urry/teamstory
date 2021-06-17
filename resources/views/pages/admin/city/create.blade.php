@extends("layouts.app")
@section("title","City")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/city')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/city')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Province</label>
                            <select name="parent_id" id="province"></select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>City</label>
                            <input type="text" name="location" class="form-control" id="location" />
                            <input type="hidden" name="level" value="2"/>
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
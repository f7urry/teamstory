@extends("layouts.app")
@section("title","Province")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/province')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/province')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Province</label>
                            <input type="text" name="location" class="form-control" id="location" />
                            <input type="hidden" name="parent_id" value="1"/>
                            <input type="hidden" name="level" value="1"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
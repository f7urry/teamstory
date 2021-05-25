@extends("layouts.app")
@section("title","Warehouse")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/warehouse')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/warehouse')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Nama Warehouse</label>
                            <input type="text" name="name" class="form-control" id="name" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
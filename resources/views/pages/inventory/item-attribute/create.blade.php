@extends("layouts.app")
@section("title","Attribute Barang")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/itemattribute')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/itemattribute')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Nama Attribute</label>
                            <input type="text" name="attribute_name" class="form-control" id="attribute_name" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
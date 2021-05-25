@extends("layouts.popup")
@section("title","Merk Baru")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#popupFormAdd" data-action="{{url('/popup/productbrand')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Merk Baru</div>
                <div class="card-body">
                    <form method="post" class="row form-popup" name="formAdd" id="popupFormAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-10">
                            <label>Merk</label>
                            <input type="text" name="name" class="form-control" id="name" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
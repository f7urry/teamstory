@extends("layouts.app")
@section("title","Vehicle")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/vehicles')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/vehicles')}}"><i class="fa fa-check"></i> Save</a></li>
</ol>
<form method="post" name="formAdd" id="formAdd" enctype="multipart/form-data" class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>No.Polisi</label>
                    <input type="text" name="code" class="form-control" id="code" />
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" id="brand" />
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control" id="model" />
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" name="manufacture_year"/>
                </div>
                <div class="form-group">
                    <label>Warna</label>
                    <input type="text" class="form-control" name="color"/>
                </div>
                <div class="form-group">
                    <label>No.BPKB</label>
                    <input type="text" class="form-control" name="vehicle_cert"/>
                </div>
                <div class="form-group">
                    <label>No.Rangka</label>
                    <input type="text" class="form-control" name="vehicle_idnumber" />
                </div> <div class="form-group">
                    <label>No.Mesin</label>
                    <input type="text" class="form-control" name="engine_number"/>
                </div>
                <div class="form-group">
                    <label>Driver</label>
                    <select name="driver_id" class="form-control">
                        <option value="0">--Driver--</option>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->party_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <fieldset class="bg-white">
                <input type="file" name="fileimage"/>
            </fieldset>
        </div>
    </div>
</form>
@endsection
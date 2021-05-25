@extends("layouts.app")
@section("title","Vehicle")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/vehicles')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/vehicles/'.$vehicle->id)}}"><i class="fa fa-check"></i> Update</a></li>
    <li class="breadcrumb-item"><a href="{{url('/vehicles/print/'.$vehicle->id)}}"><i class="fa fa-print"></i> Print QR</a></li>
</ol>
<form method="post" class="row" name="formAdd" id="formAdd" enctype="multipart/form-data">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {{ csrf_field() }}
                {{ method_field("PATCH")}}
                <div class="form-group">
                    <label>No.Polisi</label>
                    <input type="text" name="code" class="form-control" id="code"  value="{{$vehicle->code}}" />
                </div>
                <div class="form-grou">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" id="brand" value="{{$vehicle->brand}}"  />
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control" id="model"  value="{{$vehicle->model}}" />
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" name="manufacture_year" value="{{$vehicle->manufacture_year}}"/>
                </div>
                <div class="form-group">
                    <label>Warna</label>
                    <input type="text" class="form-control" name="color" value="{{$vehicle->color}}"/>
                </div>
                <div class="form-group">
                    <label>No.BPKB</label>
                    <input type="text" class="form-control" name="vehicle_cert" value="{{$vehicle->vehicle_cert}}"/>
                </div>
                <div class="form-group">
                    <label>No.Rangka</label>
                    <input type="text" class="form-control" name="vehicle_idnumber" value="{{$vehicle->vehicle_idnumber}}"/>
                </div> <div class="form-group">
                    <label>No.Mesin</label>
                    <input type="text" class="form-control" name="engine_number" value="{{$vehicle->engine_number}}"/>
                </div>
                <div class="form-group">
                    <label>Driver</label>
                    <select name="driver_id" class="form-control">
                        <option value="0">--Driver--</option>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}" {{$vehicle->driver_id==$driver->id?"selected":""}}>{{$driver->party_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <fieldset class="bg-white">
                <a href="{{url('/file/view?f='.$vehicle->vehicle_image)}}" class="lightbox-image">
                    <img src="{{url('/file/view?f='.$vehicle->vehicle_image)}}" width="256px" class="img-thumbnail"/>
                </a>
                <br/>
                <br/>
                <input type="file" name="fileimage"/>
            </fieldset>
        </div>
    </div>
</form>
@endsection

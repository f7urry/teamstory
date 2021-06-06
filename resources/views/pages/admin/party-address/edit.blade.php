@extends("layouts.app")
@section("title","Address")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/address')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/address/'.$address->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{$address->address}}"/>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{$address->city}}"/>
                    </div>
                    <div class="form-group">
                        <label>Region</label>
                        <input type="text" name="region" class="form-control" value="{{$address->region}}"/>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="{{$address->country}}"/>
                    </div>
                    <div class="form-group">
                        <label>Zip Code</label>
                        <input type="text" name="zip_code" class="form-control" value="{{$address->zip_code}}"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{$address->phone}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{$address->email}}"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

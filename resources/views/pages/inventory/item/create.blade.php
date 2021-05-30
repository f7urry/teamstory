@extends("layouts.app")
@section("title","New Item")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/item')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" data-form="#formData" class="btn-save"><i class="fa fa-check"></i> Save</a></li>
</ol>
<form class="form" action="{{url('/item')}}" name="formData" method="post" id="formData" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="item_type" value="GOODS"/>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" name="code"/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="item_name"/>
                    </div>
                    <div class="form-group">
                        <label>Alias</label>
                        <input type="text" class="form-control" name="item_alias"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <select name="item_group_id" class="form-control">
                            @foreach($groups as $val)
                                <option value="{{$val->id}}">{{$val->group_name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Brand</label>
                        <select name="item_brand_id" class="form-control">
                            @foreach($brands as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Measurement</label>
                        <select name="uom_id" class="form-control">
                            @foreach($uoms as $uom)
                                <option value="{{$uom->id}}">{{$uom->code}} - {{$uom->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Expired Date</label>
                        <input type="text" class="form-control datepicker" name="expired_date"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="sell_price"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <fieldset class="">
                        <label>Image</label>
                        <br/>
                        <input type="file" name="fileimage"/>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <legend>
                              <input class="" type="checkbox" name="is_variant" value="1" id="defaultCheck1"> Has Variant
                        </legend>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($attributes as $attr)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="variants[]" value="{{$attr->id}}">
                                        <label class="form-check-label">
                                            {{$attr->attribute_name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
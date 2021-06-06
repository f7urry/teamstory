@extends("layouts.app")
@section("title","Item")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/item')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" data-form="#formData" class="btn-save"><i class="fa fa-check"></i> Update</a></li>
    @if($item->is_variant==1)
        <li class="breadcrumb-item"><a href="javascript:openPopup('','{{url('/popup/itemvariant/'.$item->id)}}?')"><i class="fa fa-plus"></i> Create Variant</a></li>
    @endif
</ol>
<form class="form" action="{{url('/item/'.$item->id)}}" name="formData" method="post" id="formData" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field("patch")}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" name="code" value="{{$item->code}}"/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="description" value="{{$item->item_name}}"/>
                    </div>
                     <div class="form-group">
                        <label>Alias</label>
                        <input type="text" class="form-control" name="description" value="{{$item->item_alias}}"/>
                    </div>
                     <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{$item->description}}"/>
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <select name="item_group_id" class="form-control">
                            @foreach($groups as $val)
                                <option value="{{$val->id}}" {{$item->item_group_id==$val->id?"selected":""}}>{{$val->group_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="item_brand_id" class="form-control">
                            @foreach($brands as $val)
                                <option value="{{$val->id}}" {{$item->item_brand_id==$val->id?"selected":""}}>{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Measurement</label>
                        <select name="uom_id" class="form-control">
                            @foreach($uoms as $uom)
                                <option value="{{$uom->id}}" {{$item->uom_id==$uom->id?"selected":""}}>{{$uom->code}} - {{$uom->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Expired date</label>
                        <input type="text" class="form-control datepicker" name="expired_date" value="{{$item->expired_date}}"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="sell_price" value="{{$item->sell_price}}"/>
                    </div>
                    <div class="form-group">
                        <label>Minimum Stock</label>
                        <input type="text" class="form-control" name="minimum_stock" value="{{$item->minimum_stock}}"/>
                    </div>
                    <fieldset class="">
                        <a href="{{url('/file/view?f='.$item->item_image)}}" class="lightbox-image" rel="1">
                            <img src="{{url('/file/view?f='.$item->item_image)}}" width="256px" class="img-thumbnail"/>
                        </a>
                        <br/>
                        <label>Image</label>
                        <br/>
                        <input type="file" name="fileimage"/>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <legend>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_variant" value="1" id="defaultCheck1" {{$item->is_variant==1?"disabled checked":""}}>
                                <label class="form-check-label" for="defaultCheck1">
                                    Has Variant
                                </label>
                            </div>
                        </legend>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($attributes as $attr)
                                    @php($checked=false)
                                    @foreach($item->variants as $var)
                                        @if($var->item_attribute_id==$attr->id)
                                            @php($checked=true)
                                            @break
                                        @endif
                                    @endforeach
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="variants[]" value="{{$attr->id}}" {{$checked?"checked":""}}>
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
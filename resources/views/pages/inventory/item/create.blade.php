@extends("layouts.app")
@section("title","Barang Baru")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/item')}}"><i class="fa fa-arrow-left"></i> Kembali</a></li>
    <li class="breadcrumb-item"><a href="#" data-form="#formData" class="btn-save"><i class="fa fa-check"></i> Simpan</a></li>
</ol>
<form class="form" action="{{url('/item')}}" name="formData" method="post" id="formData" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="item_type" value="GOODS"/>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="code"/>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="item_name"/>
                    </div>
                    <div class="form-group">
                        <label>Alias</label>
                        <input type="text" class="form-control" name="item_alias"/>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Grup</label>
                        <select name="item_group_id" class="form-control">
                            @foreach($groups as $val)
                                <option value="{{$val->id}}">{{$val->group_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="uom_id" class="form-control">
                            @foreach($uoms as $uom)
                                <option value="{{$uom->id}}">{{$uom->code}} - {{$uom->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit Price</label>
                        <input type="text" class="form-control" name="sell_price"/>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <legend>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_variant" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Ada varian
                                </label>
                            </div>
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
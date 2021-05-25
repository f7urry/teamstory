@extends("layouts.popup")
@section("title","Varian Baru")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#popupFormAdd" data-action="{{url('/popup/itemvariant/'.$item->id)}}"><i class="fa fa-check"></i> Buat Varian</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="form-popup" name="formAdd" id="popupFormAdd">
                        {{ csrf_field() }}
                        @foreach($item->variants as $variant)
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>{{$variant->attribute->attribute_name}}</label>
                                </div>
                                <div class="form-group col-md-8">
                                    @foreach($variant->attribute->details as $detail)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="attribute_details[]" value="{{$variant->attribute->id.'_'.$detail->id}}">
                                            <label class="form-check-label">
                                                {{$detail->attribute_code}} - {{$detail->attribute_value}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr/>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
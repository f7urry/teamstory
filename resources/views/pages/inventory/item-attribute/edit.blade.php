@extends("layouts.app")
@section("title","Attribute Barang")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/itemattribute')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/itemattribute/'.$itemattribute->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<form method="post" name="formAdd" id="formAdd">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label onclick="javascript:alert('alert');">Attribute Barang</label>
                        <input type="text" name="attribute_name" class="form-control" id="name" value="{{$itemattribute->attribute_name}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12 table-responsive">
                        <button class="btn btn-primary" id="btn_add_varian" type="button"><i class="fa fa-plus"></i> Tambah Varian</button>
                        <table class="table table-bordered mt-2" id="dtable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Kode</th>
                                    <th>Varian</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($itemattribute->details as $det)
                                    <tr>
                                        <td><input type="text" name="attribute_codes[]" class="form-control" value="{{$det->attribute_code}}"/></td>
                                        <td><input type="text" name="attribute_values[]" class="form-control" value="{{$det->attribute_value}}"/></td>
                                        <td>
                                            <input type="hidden" name="attribute_details[]" value="{{$det->id}}"/>
                                            <button type="button" class='btn btn-danger btn-remove-row'><i class='fa fa-times'></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push("scripts")
<script type="text/javascript">
    $("#btn_add_varian").on("click",btn_add_varian);

    function btn_add_varian(){
        var el=`
            <tr>
                <td><input type="text" name="attribute_codes[]" class="form-control"/></td>
                <td><input type="text" name="attribute_values[]" class="form-control"/></td>
                <td>
                    <input type="hidden" name="attribute_details[]" value="0"/>
                    <button type="button" class='btn btn-danger btn-remove-row'><i class='fa fa-times'></i></button>
                </td>
            </tr>`;
        $("#dtable tbody").append(el);
        $_ui();
    }
</script>
@endpush
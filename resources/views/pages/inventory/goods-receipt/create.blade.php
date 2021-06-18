@extends("layouts.app")
@section("title","Goods Receipt")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/goodsreceipt')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/goodsreceipt')}}"><i class="fa fa-check"></i> Save</a></li>
</ol>
<form method="post" name="formAdd" id="formAdd">
    <input type="hidden" name="reference_type" value="ENTRY"/>
    <input type="hidden" name="reference_no" value=""/>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <label>Date</label>
                        <input type="text" name="date" class="form-control datepicker" id="date" value="{{date('Y-m-d')}}" />
                    </div>

                    <div class="form-group col-md-12">
                        <label>Warehouse</label>
                        <select name="warehouse_id" class="form-control" id="warehouse" >
                            <option value="" disabled selected>--Warehouse--</option>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Notes</label>
                        <input type="text" name="notes" class="form-control" id="notes" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12 table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <select id="scan_barcode" class="form-control col-md-3"></select>
                            </div>
                        </div>
                        <table class="table table-bordered mt-2 table-sm" id="dtable">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="25%">Item</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Uom</th>
                                    <th>Barcode</th>
                                    <th>Batch</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
    </div>
</form>
@endsection
@push("scripts")
<script type="text/javascript">
    $_select("#scan_barcode",base_url()+'/api/item/options',function(){
        var val=$(this).val();
        $(this).empty();
        $(this).focus();
        $.get(`${base_url()}/api/item/get/${val}`,function(data){
            add_item(data);
        });
    });

    var index = 0;
    function add_item(item){
        var el=`
            <tr>
                <td>
                    <input type="hidden" name="uom_id[]" class="form-control" value="${item.uom_id}"/>
                    <input type="hidden" name="item_id[]" class="form-control" value="${item.id}"/>
                    <span id="item${index}">${item.code} - ${item.item_name}</span>
                </td>
                <td>
                    ${item.current_stock}
                </td>
                <td>
                    <input type="number" name="quantity[]" class="form-control col-md-4" value="0"/>
                </td>
                <td>
                    ${item.uom.name}
                </td>
                <td>
                    <input type="text" name="barcode[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="batch_number[]" class="form-control"/>
                </td>
                <td>
                    <button type="button" class='btn btn-danger btn-remove-row'><i class='fa fa-times'></i></button>
                </td>
            </tr>`;
        $("#dtable tbody").append(el);
        index++;
        $_ui();
    }
</script>
@endpush
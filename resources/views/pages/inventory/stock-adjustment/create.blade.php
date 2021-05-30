@extends("layouts.app")
@section("title","Stock Adjustment")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/stockadjustment')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/stockadjustment')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12 table-responsive">
                            <button class="btn btn-primary" id="btn_add" type="button"><i class="fa fa-plus"></i> Add Item</button>
                            <table class="table table-bordered mt-2" id="dtable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Barcode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
    $("#btn_add").on("click",function(){
        btn_add_item();
    });

    var index = 0;
    function btn_add_item(){
        var el=`
            <tr>
                <td>
                    <div class="form-row">
                        <div class="col">
                            <select type="text" id="item${index}" name="item_id[]" class="form-control">
                                <option value="" selected disabled>-- Select Item --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a href="javascript:openPopup('item${index}','{{url('/popup/item/create')}}?')"><button class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button></a>
                        </div>
                    </div>
                </td>
                <td><input type="number" name="quantity[]" class="form-control" value=""/></td>
                <td><input type="text" name="barcode[]" class="form-control" value=""/></td>
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
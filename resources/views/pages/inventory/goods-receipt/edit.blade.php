@extends("layouts.app")
@section("title","Goods Receipt")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/goodsreceipt')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/goodsreceipt/'.$goodsReceipt->id)}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        {{ method_field("PATCH")}}
                         <div class="form-group col-md-12">
                            <label>Code</label>
                            <input type="text" name="code" disabled value="{{$goodsReceipt->code}}" class="form-control"/>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control" id="date" value="{{ $goodsReceipt->date }}" disabled/>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Warehouse</label>
                            <select name="warehouse_id" class="form-control" id="warehouse" disabled>
                                <option value="{{ $goodsReceipt->warehouse->id }}">{{ $goodsReceipt->warehouse->name }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Notes</label>
                            <input type="text" name="notes" class="form-control" id="notes" value="{{ $goodsReceipt->notes }}" disabled/>
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
                            <table class="table table-bordered mt-2" id="dtable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="25%">Barcode</th>
                                        <th>Item Name</th>
                                        <th>Item Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($goodsReceipt->goodsReceiptItems as $item)
                                        <tr>
                                            <td><input type="text" name="barcode[]" class="form-control" value="{{ $item->barcode }}" disabled/></td>
                                            <td><input type="text" name="item[]" class="form-control" value="{{ $item->item->item_name }}" disabled/></td>
                                            <td><input type="text" name="quantity[]" class="form-control" value="{{ $item->quantity }}" disabled/></td>
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
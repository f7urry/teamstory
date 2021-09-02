<form method="post" name="formAdd" id="formAdd">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    <div class="row">
            <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="party_id" id="customer_id" value="{{$so->party_id}}"/>
                    </div>
                    <div class="form-group col-md-12">
                        <b>Sold To:</b><br/>
                        {{$so->party->party_name}}<br/>
                        {{$so->party->address->address}}
                        {{$so->party->address->city->location}},
                        {{$so->party->address->province->location}},
                        {{$so->party->address->province->parent->location}},
                        {{$so->party->address->zipcode}}<br/>
                        {{$so->party->address->phone}}<br/>
                        {{$so->party->address->email}}<br/>
                    </div>
                    <div class="form-group col-md-12">
                        <b>Delivery To:</b><br/>
                        {{$so->shipping_address->pic_name}}<br/>
                        {{$so->shipping_address->address}}
                        {{$so->shipping_address->city->location}},
                        {{$so->shipping_address->province->location}},
                        {{$so->shipping_address->province->parent->location}},
                        {{$so->shipping_address->zipcode}}<br/>
                        {{$so->shipping_address->phone}}<br/>
                        {{$so->shipping_address->email}}<br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label>Sales No</label>
                        <input type="text" name="code" class="form-control" id="code" value="{{$so->code}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Invoice No</label>
                        <input type="text" name="code" class="form-control" id="code" value="{{$so->invoice_code}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Invoice Date</label>
                        <input type="text" name="date" class="form-control" id="date" value="{{DateHelper::date_format($so->date)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Invoice Due Date</label>
                        <input type="text" name="due_date" class="form-control" id="date" value="{{DateHelper::date_format($so->due_date)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Reference</label>
                        <input type="text" name="reference" class="form-control" id="date" value="{{$so->reference}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Notes</label>
                        <input type="text" name="note" class="form-control" id="date" value="{{$so->note}}" disabled/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" id="currency" value="{{$so->currency}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Shipping Cost</label>
                        @if(Gate::check("is_update"))
                            <input type="text" name="shipping_cost" class="form-control" id="shipping_cost" value="{{number_format($so->shipping_cost)}}" {{$so->sales_status=="WAITING"?"disabled":""}}/>
                        @else
                            <input type="text" name="shipping_cost" class="form-control" id="shipping_cost" value="{{number_format($so->shipping_cost)}}" disabled/>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label>Subtotal</label>
                        <input type="text" name="subtotal" class="form-control" id="subtotal" value="{{number_format($so->amount)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Tax(10%)</label>
                        <input type="text" name="tax" class="form-control" id="tax" value="{{number_format($so->tax)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Total Discount</label>
                        <input type="text" name="subtotal" class="form-control" id="amount_discount" value="{{number_format($so->amount_discount)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Grand Total</label>
                        <input type="text" name="gtotal" class="form-control" id="gtotal" value="{{number_format($so->amount+$so->tax)}}" disabled/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label>Sales Status</label>
                        <input type="text" name="status" class="form-control" id="sales_status" value="{{str_replace('_',' ',$so->sales_status)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" id="status" value="{{$so->status}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Unpaid</label>
                        <input type="text" name="unpaid_amount" class="form-control" id="unpaid_amount" value="{{number_format($so->unpaid_amount)}}" disabled/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Paid</label>
                        <input type="text" name="paid_amount" class="form-control" id="paid_amount" value="{{number_format($so->paid_amount)}}" disabled/>
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
                        <table class="table table-bordered mt-2 table-sm" id="dtable">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="25%">Item</th>
                                    <th>Quantity</th>
                                    <th>Free Qty</th>
                                    <th>Uom</th>
                                    <th>Weight(Kg)</th>
                                    <th>Price</th>
                                    <th>Discount(%)</th>
                                    <th>Total</th>
                                    <th>Tonase(Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($so->items as $detail)
                                    <tr>
                                        <td>
                                            @if($so->sales_status=="WAITING")
                                                <input type="hidden" name="soi[]" value="{{$detail->id}}"/>
                                            @endif
                                            {{$detail->item->code}} - {{$detail->item->item_name}}
                                        </td>
                                        <td>
                                                @if($so->sales_status=="WAITING" && Gate::check('is_update'))
                                                <input type="text" name="qty[]" value="{{$detail->qty}}" class="form-control number calc quantity"/>
                                            @else
                                                {{$detail->qty}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($so->sales_status=="WAITING" && Gate::check('is_update'))
                                                <input type="text" name="free_qty[]" value="{{$detail->free_qty}}" class="form-control number"/>
                                            @else
                                                {{$detail->free_qty}}
                                            @endif
                                        </td>
                                        <td>{{$detail->item->uom->code}}</td>
                                        <td>{{$detail->item->weight}}</td>
                                        <td>
                                                @if($so->sales_status=="WAITING" && Gate::check('is_update'))
                                                <input type="text" name="price[]" value="{{number_format($detail->price)}}" class="form-control number calc price"/>
                                            @else
                                                {{number_format($detail->price)}}
                                            @endif
                                        </td>
                                        <td>
                                                @if($so->sales_status=="WAITING" && Gate::check('is_update'))
                                                <input type="text" name="discount[]" value="{{number_format($detail->discount)}}" class="form-control number calc discount"/>
                                            @else
                                                {{number_format($detail->discount)}} %
                                            @endif
                                        </td>
                                        <td>
                                            <input type="text" name="total[]" class="total form-control col-md-12 number" value="{{number_format($detail->total)}}" readonly/>
                                        </td>
                                        <td>{{$detail->item->weight*($detail->qty+$detail->free_qty)}}</td>
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
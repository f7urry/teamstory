@extends("layouts.app")
@section("title","Sales Order")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/usertransaction')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="{{url('/usertransaction/'.$so->id.'/print')}}"><i class="fa fa-print"></i> Print</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
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
                        {{ csrf_field() }}
                         <div class="form-group col-md-12">
                            <label>Invoice No</label>
                            <input type="text" name="code" class="form-control" id="code" value="{{$so->code}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Invoice Date</label>
                            <input type="text" name="date" class="form-control" id="date" value="{{$so->date}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Invoice Due Date</label>
                            <input type="text" name="due_date" class="form-control" id="date" value="{{$so->due_date}}" disabled/>
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
                            <input type="text" name="shipping_cost" class="form-control" id="shipping_cost" value="{{$so->shipping_cost}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Subtotal</label>
                            <input type="text" name="subtotal" class="form-control" id="date" value="{{$so->amount-$so->tax}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Tax(10%)</label>
                            <input type="text" name="tax" class="form-control" id="date" value="{{$so->tax}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Total Discount</label>
                            <input type="text" name="subtotal" class="form-control" id="date" value="{{$so->amount_discount}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Grand Total</label>
                            <input type="text" name="gtotal" class="form-control" id="date" value="{{$so->amount}}" disabled/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" id="date" value="{{$so->status}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Unpaid</label>
                            <input type="text" name="unpaid_amount" class="form-control" id="date" value="{{$so->unpaid_amount}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Paid</label>
                            <input type="text" name="paid_amount" class="form-control" id="date" value="{{$so->paid_amount}}" disabled/>
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
                                        <th width="25%">Item</th>
                                        <th>Quantity</th>
                                        <th>Free Qty</th>
                                        <th>Price</th>
                                        <th>Discount(%)</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($so->items as $detail)
                                        <tr>
                                            <td>{{$detail->item->code}} - {{$detail->item->item_name}}</td>
                                            <td>{{$detail->qty}}</td>
                                            <td>{{$detail->free_qty}}</td>
                                            <td>{{$detail->price}}</td>
                                            <td>{{$detail->discount}}</td>
                                            <td>{{$detail->total}}</td>
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
</script>
@endpush
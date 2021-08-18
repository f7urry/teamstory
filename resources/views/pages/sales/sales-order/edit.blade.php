@extends("layouts.app")
@section("title","Sales Order")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/salesorder')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/print')}}"><i class="fa fa-print"></i> Print</a></li>
        @if($so->sales_status=="WAITING")
            <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/salesorder/'.$so->id)}}"><i class="fa fa-check"></i> Update</a></li>
        @endif
        @if($so->sales_status=="DELIVERED" && $so->status=="UNPAID")
            <li class="breadcrumb-item"><a href="{{url('/receivable/create?ref='.$so->id)}}"><i class="fa fa-money-bill"></i> Create Payment</a></li>
        @endif
        @if($so->sales_status=="IN_PROCESS")
            <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/delivery')}}"><i class="fa fa-truck"></i> Delivered</a></li>
        @endif
        @if($so->sales_status=="WAITING")
            <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/process')}}"><i class="fa fa-arrow-alt-circle-right"></i> Process</a></li>
        @endif
    </ol>
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
                            <input type="text" name="shipping_cost" class="form-control" id="shipping_cost" value="{{number_format($so->shipping_cost)}}" {{$so->sales_status=="WAITING"?"disabled":""}}/>
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
                                            <td>
                                                @if($so->sales_status=="WAITING")
                                                    <input type="hidden" name="soi[]" value="{{$detail->id}}"/>
                                                @endif
                                                {{$detail->item->code}} - {{$detail->item->item_name}}
                                            </td>
                                            <td>
                                                 @if($so->sales_status=="WAITING")
                                                    <input type="text" name="qty[]" value="{{$detail->qty}}" class="form-control number calc quantity"/>
                                                @else
                                                    {{$detail->qty}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($so->sales_status=="WAITING")
                                                    <input type="text" name="free_qty[]" value="{{$detail->free_qty}}" class="form-control number"/>
                                                @else
                                                    {{$detail->free_qty}}
                                                @endif
                                            </td>
                                            <td>
                                                 @if($so->sales_status=="WAITING")
                                                    <input type="text" name="price[]" value="{{number_format($detail->price)}}" class="form-control number calc price"/>
                                                @else
                                                   {{number_format($detail->price)}}
                                                @endif
                                            </td>
                                            <td>
                                                 @if($so->sales_status=="WAITING")
                                                    <input type="text" name="discount[]" value="{{number_format($detail->discount)}}" class="form-control number calc discount"/>
                                                @else
                                                   {{number_format($detail->discount)}}
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" name="total[]" class="total form-control col-md-12 number" value="{{number_format($detail->total)}}" readonly/>
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
$(function(){
    $(".calc").on("keyup",function(){calc()});
});
function calc(){
    var qty=$(".quantity");
    var price=$(".price");
    var discount=$(".discount");
    var total=$(".total");
    
    var gtotal=0;
    for(var i=0;i<qty.length;i++){
        var q=number_value(qty.eq(i).val());
        var p=number_value(price.eq(i).val());
        var d=number_value(discount.eq(i).val());
        var t=q*p;
        t=t-(t*d/100);
        console.log(q+":"+p+":"+d+":"+t);
        total.eq(i).val(number_format(t));
        
        gtotal+=t;
    }
    var shipping=$("#shipping_cost").val(); 
    gtotal+=parseInt(number_value(shipping));
    $("#subtotal").val(number_format(gtotal));
    $("#tax").val(number_format(gtotal*0.1));
    
    var unpaid=number_format(gtotal+(gtotal*0.1));
    $("#gtotal").val(unpaid);
    $("#unpaid_amount").val(unpaid);
}
</script>
@endpush
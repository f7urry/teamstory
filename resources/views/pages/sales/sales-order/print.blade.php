@extends("layouts.print")
@section("title","Print")
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{url('/assets/img/logo.png')}}" height="68px" class="bg-white rounded">
                </div>
                <div class="col-md-6">
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="5" class="text-center">SALES INVOICE</th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white text-center">Invoice No.</th>
                                <th class="bg-dark text-white text-center">Invoice Date</th>
                                <th class="bg-dark text-white text-center">Due Date</th>
                                <th class="bg-dark text-white text-center">Curr.</th>
                                <th class="bg-dark text-white text-center">Salesman</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$so->code}}</td>
                            <td>{{$so->date}}</td>
                            <td>{{$so->due_date}}</td>
                            <td>{{$so->currency}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row ml-1 mr-1">
                <div class="col-4 border">
                    SOLD TO:<br/>
                    {{$so->party->party_name}}
                    {{$so->party->address->address}}
                    {{$so->party->address->city}},
                    {{$so->party->address->region}},
                    {{$so->party->address->province}},
                    {{$so->party->address->country}},
                    {{$so->party->address->zipcode}}<br/>
                    {{$so->party->address->phone}}<br/>
                    {{$so->party->address->email}}<br/>
                </div>
                <div class="col-4"></div>
                <div class="col-4 border">
                    DELIVERY TO:<br/>
                    {{$so->shipping_address->pic_name}}<br/>
                    {{$so->shipping_address->address}}
                    {{$so->shipping_address->city}},
                    {{$so->shipping_address->region}},
                    {{$so->shipping_address->province}},
                    {{$so->shipping_address->country}},
                    {{$so->shipping_address->zipcode}}<br/>
                    {{$so->shipping_address->phone}}<br/>
                    {{$so->shipping_address->email}}<br/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Art No.</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Free</th>
                                <th>Disc</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($so->items as $i=>$detail)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$detail->item->code}}</td>
                                    <td>{{$detail->item->item_name}}</td>
                                    <td>{{$detail->qty}}</td>
                                    <td>{{$detail->free_qty}}</td>
                                    <td align="right">{{$detail->discount}}</td>
                                    <td align="right">{{number_format($detail->price)}}</td>
                                    <td align="right">{{number_format($detail->total)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="6" rowspan="3">Said<br/>
                                    {{ucwords(NumberHelperID::terbilang($so->amount))}}
                                </td>
                                <td>Total Discount</td>
                                <td align="right">{{number_format($so->amount_discount)}}</td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td align="right">{{number_format($so->amount-$so->tax)}}</td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td align="right">{{number_format($so->tax)}}</td>
                            </tr>
                            <tr>
                                <td colspan="6">MEMO</td>
                                <td>NETTO</td>
                                <td align="right">{{number_format($so->amount)}}</td>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends("layouts.print")
@section("title","Print")
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6" style="font-size: 12px;">
                    <img src="{{url('/assets/app/img/logo.png')}}" height="48px" class="bg-white rounded"><br/>
                    PT.INESIA NUSANTARA SEMESTA<br/>
                    ASKRIDA TOWER LT.4 R.401 A<br/>
                    JL.PRAMUKA RAYA KAV.151 RT.009 RW.005<br/>
                    UTAN KAYU UTARA, MATRAMAN JAKARTA TIMUR DKI JAKARTA<br/>
                    Tel. 0817-0817-767
                </div>
                <div class="col-md-6">
                    <table width="100%" class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <td colspan="5" class="text-center">SALES INVOICE</td>
                            </tr>
                            <tr>
                                <th class="text-center">Invoice No.</th>
                                <th class="text-center">Invoice Date</th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Curr.</th>
                                <th class="text-center">Salesman</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$so->invoice_code}}</td>
                            <td>{{DateHelper::date_format($so->date)}}</td>
                            <td>{{DateHelper::date_format($so->due_date)}}</td>
                            <td>{{$so->currency}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row ml-1 mr-1 mt-5">
                <div class="col-4 border">
                    SOLD TO:<br/>
                    {{$so->party->party_name}}
                    {{$so->party->address->address}}
                    {{$so->party->address->city->location}},
                    {{$so->party->address->province->location}},
                    {{$so->party->address->province->parent->location}},
                    {{$so->party->address->zip_code}}<br/>
                    {{$so->party->address->phone}}<br/>
                    {{$so->party->address->email}}<br/>
                </div>
                <div class="col-4"></div>
                <div class="col-4 border">
                    DELIVERY TO:<br/>
                    {{$so->shipping_address->pic_name}}<br/>
                    {{$so->shipping_address->address}}
                    {{$so->shipping_address->city->location}},
                    {{$so->shipping_address->province->location}},
                    {{$so->shipping_address->province->parent->location}},
                    {{$so->shipping_address->zip_code}}<br/>
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
                                    <td>{{$i+1}}</td>
                                    <td>{{$detail->item->code}}</td>
                                    <td>{{$detail->item->item_name}}</td>
                                    <td>{{$detail->qty}}</td>
                                    <td>{{$detail->free_qty}}</td>
                                    <td align="right">{{number_format($detail->discount)}}%</td>
                                    <td align="right">{{number_format($detail->price)}}</td>
                                    <td align="right">{{number_format($detail->total)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" rowspan="3" class="font-italic">Said:<br/>
                                    {{ucwords(NumberHelperID::terbilang($so->amount+$so->tax))}}
                                </td>
                                <td>Total Discount</td>
                                <td align="right">{{number_format($so->amount_discount)}}</td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td align="right">{{number_format($so->amount)}}</td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td align="right">{{number_format($so->tax)}}</td>
                            </tr>
                            <tr>
                                <td colspan="6">MEMO</td>
                                <td>NETTO</td>
                                <td align="right">{{number_format($so->amount+$so->tax)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
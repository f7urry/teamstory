@extends("layouts.print")
@section("title","Print Ledger Summary")
@push("extra_format")
    <button onclick="javascript:exportFile('dtable','xls')" type="button" class="btn btn-warning">
        <span class='fa fa-file-excel'></span>&nbsp;Excel
    </button>
@endpush
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            <table align="right" width="100%">
                <tr>
                    <td colspan="2" align="right"><h1>Sales Detail</h1></td>
                </tr>
                <tr>
                    <td>From: {{request()->from}} To: {{request()->to}}</td>
                </tr>
            </table>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group col-md-12 table-responsive" id="dtable">
                @foreach ($sales as $i=>$data)
                    <table class="table table-borderless">
                        <tr>
                            <td width="100px">No:{{$data->code}}</td>
                            <td width="100px">Date:{{$data->code}}</td>
                            <td width="100px">Status:{{$data->status}}</td>
                        </tr>
                        <tr>
                            <td>Area:{{$data->party->address->city->location}}</td>
                            <td>Customer:{{$data->party->party_name}}</td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="table table-bordered mt-2">
                        <tr class="bg-dark text-white">
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Free Qty</th>
                            <th>Uom</th>
                            <th>Weight(Kg)</th>
                            <th>Tonase(Kg)</th>
                            <th>Price</th>
                            <th>Discount(%)</th>
                            <th>Total</th>
                        </tr>
                        @php($total=0)
                        @foreach ($data->items as $item)
                            <tr>
                                <td>{{ $item->item->item_name}}</td>
                                <td>{{ $item->qty}}</td>
                                <td>{{ $item->free_qty}}</td>
                                <td>{{ $item->item->uom->code}}</td>
                                <td>{{ $item->item->weight}}</td>
                                <td>{{ $item->item->weight*($item->qty+$item->free_qty)}}</td>
                                <td>{{ number_format($item->price)}}</td>
                                <td>{{ $item->discount}}</td>
                                <td class="text-right">{{ number_format($item->total)}}</td>
                            </tr>
                            @php($total+=$item->total)
                        @endforeach
                        <tr>
                            <th colspan="8" class="text-right">Total</th>
                            <th class="text-right">{{ number_format($total)}}</th>
                        </tr>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
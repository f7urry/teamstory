@extends("layouts.print")
@section("title","Print Goods Issue")
@section("content")
<div class="page-width-a4-potrait">
    <div class="row mt-3">
        <div class="col-md-12">
            <table align="right" width="100%" class="table table-borderless table-sm">
                <tr>
                    <td width="64px">
                        <img src="{{url('/assets/app/img/logo.png')}}" style="width: 128px"/>
                    </td>
                    <td>
                        <p style="font-size: 15px"></p>
                        <p style="font-size: 10px;"></p>
                    </td>
                    <td align="right">
                        <h1>Goods Issue</h1>
                        <p style="font-size: 14px;"><b>No: </b>{{ $goodsIssue->code}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-md-12 table-responsive">
                <table width="100%">
                    <tr>
                        <td><b>Date:</b> {{$goodsIssue->date}}</td>
                        <td><b>Warehouse:</b> {{$goodsIssue->warehouse->name}}</td>
                        <td><b>Grid:</b> {{$goodsIssue->grid_code}}</td>
                    </tr>
                </table>
                <table class="table table-bordered mt-2" id="dtable">
                    <thead class="thead-dark bg-dark">
                        <tr>
                            <th width="25%">Barcode</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goodsIssue->goodsIssueItems as $item)
                            <tr>
                                <td>{{ $item->barcode }}</td>
                                <td>{{ $item->item->item_name }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection

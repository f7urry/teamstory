@extends("layouts.print")
@section("title","Print Ledger Summary")
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            <table align="right" width="100%">
                <tr>
                    <td colspan="2" align="right"><h1>Ledger Summary</h1></td>
                </tr>
                <tr>
                    <td>Date: {{request()->date}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group col-md-12 table-responsive">
                <table class="table table-bordered mt-2" id="dtable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Barcode</th>
                            <th>Item Name</th>
                            <th>Qty In</th>
                            <th>Qty Out</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stock as $i=>$item)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{ $item->barcode }}</td>
                                <td>{{ $item->item->item_name }}</td>
                                <td>{{ $item->qty_in }}</td>
                                <td>{{ $item->qty_out }}</td>
                                <td>{{ $item->qty_in-$item->qty_out}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
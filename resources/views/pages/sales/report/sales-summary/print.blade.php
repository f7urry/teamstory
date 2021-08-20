@extends("layouts.print")
@section("title","Print Ledger Summary")
@push("extra_format")
    <button onclick="javascript:exportCSV('dtable')" type="button" class="btn btn-warning">
        <span class='fa fa-file-csv'></span>&nbsp;CSV
    </button>
@endpush
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            <table align="right" width="100%">
                <tr>
                    <td colspan="2" align="right"><h1>Sales Summary</h1></td>
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
                            <th>Area</th>
                            <th>No.Sales</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $i=>$data)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{ $data->party->address->city->location}}</td>
                                <td>{{ $data->code}}</td>
                                <td>{{ $data->party->party_name}}</td>
                                <td>{{ $data->status}}</td>
                                <td align="right">{{ number_format($data->amount+$data->tax)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
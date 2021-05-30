@extends("layouts.app")
@section('title','Receivable')
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/receivable')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" id="btn_save"><i class="fa fa-check"></i> Update</a></li>
</ol>
<form name="formAdd" id="formAdd" action="{{url('/receivable/'.$rec->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('patch')}}
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4">Sales Orrder</label>
                                <span class="col-md-6">: {{$rec->salesorder->code." - ".$rec->salesorder->product->serial_no}}
                                <a href="{{url('/salesorder/'.$rec->salesorder->id)}}"><i class='fa fa-search'></i></a>
                                </span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Customer</label>
                                <span class="col-md-6">: {{$rec->salesorder->party->party_name}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Address</label>
                                <span class="col-md-6">: {{$rec->salesorder->party->address}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Phone</label>
                                <span class="col-md-6">: {{$rec->salesorder->party->phone}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Sales Amount</label>
                                <span class="col-md-6">: Rp{{number_format($rec->salesorder->sell_price)}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Receivable Amount</label>
                                <span class="col-md-6">: Rp{{number_format($rec->amount)}}</span>
                            </div>
                             <div class="form-group">
                                <label>Note</label>
                                <input type="text" name="note" value="{{$rec->note}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
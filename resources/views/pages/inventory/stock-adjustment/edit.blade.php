@extends("layouts.app")
@section("title","Stock Adjustment")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/stockadjustment')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control" id="date" value="{{$adjustment->date}}" disabled/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Warehouse</label>
                            <input type="text" name="warehouse" class="form-control" id="date" value="{{$adjustment->warehouse->name}}" disabled/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <fieldset class="">
                            <a href="{{url('/file/view?f='.$adjustment->file_doc)}}">View Document</a>
                        </fieldset>
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
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adjustment->details as $detail)
                                        <tr>
                                            <td>{{$detail->item->item_name}}</td>
                                            <td>{{$detail->qty}}</td>
                                            <td>{{$detail->barcode}}</td>
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

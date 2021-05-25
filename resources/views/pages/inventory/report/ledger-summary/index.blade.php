@extends("layouts.app")
@section("title","Ledger Summary")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/ledgersummary')}}" data-confirm="false"><i class="fa fa-search"></i> Show</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control datepicker" id="date" />
                        </div>

                        <div class="form-group col-md-12">
                            <label>Warehouse</label>
                            <select name="warehouse_id" class="form-control" id="warehouse" >
                                <option value="" disabled selected>--Warehouse--</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>     
@endsection
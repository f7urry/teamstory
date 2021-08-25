@extends("layouts.app")
@section("title","Sales Detail")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/salesdetail')}}" data-confirm="false"><i class="fa fa-search"></i> Show</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Customer</label>
                            <select id="customer" name="customer" class="form-control"></select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Period</label>
                            <div class="form-inline">
                                <select name="month" class="form-control col-md-6">
                                    @php($months=DateHelper::monthList())
                                    @foreach($months as $i=>$month)
                                        <option value="{{$i+1}}">{{$month}}</option>
                                    @endforeach
                                </select>
                                <select name="year" class="form-control col-md-6">
                                    @for($i=date("Y");$i>(date("Y")-5);$i--)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label>From</label>
                            <div class="form-inline">
                                <input type="text" name="from" class="form-control col-md-4 datepicker" id="from" />
                                To
                                <input type="text" name="to" class="form-control col-md-4 datepicker" id="to" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">-Status-</option>
                                <option>UNPAID</option>
                                <option>PAID</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push("scripts")
<script type="text/javascript">
    $_select("#customer",base_url()+"/api/customer/options");
</script>
@endpush
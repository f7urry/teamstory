@extends("layouts.app")
@section('title','Receivable')
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/receivable')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" id="btn_save"><i class="fa fa-check"></i> Save</a></li>
</ol>
<form name="formAdd" id="formAdd" action="{{url('/receivable')}}" method="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" class="datepicker form-control" name="date" value="{{date('Y-m-d')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Sales Order</label>
                                <div class="input-group">
                                    <select name="sales_order_id" id="salesorder"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Customer</label>
                                <input type="text" class="form-control" disabled id="party"/>
                            </div>
                            <div class="form-group">
                                <label>Addrss</label>
                                <input type="text" class="form-control" disabled id="address"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" disabled id="phone"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sales Amount</label>
                                <input type="text" class="form-control number" disabled value="0" id="sell_price"/>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Unpaid</label>
                                <input type="text" class="form-control number" readonly id="unpaid"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Installment Amount</label>
                                    <input type="text" class="form-control number" disabled value="0" id="tenor_amount"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Receivable Amount</label>
                                <input type="text" class="form-control number" name="amount" value="0"/>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
        $_select("#salesorder",base_url()+"/api/salesorder/options?status=UNPAID",function(){
            var id=$(this).val();
            set_so(id);
        });
    });
    function set_so(id){
        $.get(base_url()+"/api/salesorder/get/"+id,function(data){
            $("#party").val(data.party.party_name);
            $("#address").val(data.party.address);
            $("#phone").val(data.party.phone);
            $("#unpaid").val(number_format(data.unpaid_amount));
            $("#sell_price").val(number_format(data.sell_price));
            $("#tenor_amount").val(number_format((data.sell_price-data.prepayment_amount)/data.tenor_count));

            $("#model").val(data.product.model.name);
            $("#year").val(data.product.attr.manufacture_year);
        });
    }
</script>
@endpush

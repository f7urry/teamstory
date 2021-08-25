@extends("layouts.app")
@section("title","Sales Order")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/salesorder')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/print')}}"><i class="fa fa-print"></i> Print</a></li>
    @if($so->sales_status=="WAITING")
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/salesorder/'.$so->id)}}"><i class="fa fa-check"></i> Update</a></li>
    @endif
    @if($so->sales_status=="DELIVERED" && $so->status=="UNPAID")
        <li class="breadcrumb-item"><a href="{{url('/receivable/create?ref='.$so->id)}}"><i class="fa fa-money-bill"></i> Create Payment</a></li>
    @endif
    @if($so->sales_status=="IN_PROCESS")
        <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/delivery')}}"><i class="fa fa-truck"></i> Delivered</a></li>
    @endif
    @if($so->sales_status=="WAITING")
        <li class="breadcrumb-item"><a href="{{url('/salesorder/'.$so->id.'/process')}}"><i class="fa fa-arrow-alt-circle-right"></i> Process</a></li>
    @endif
</ol>
@include("pages.sales.sales-order.edit-info")
@endsection

@push("scripts")
<script type="text/javascript">
$(function(){
    $(".calc").on("keyup",function(){calc()});
});
function calc(){
    var qty=$(".quantity");
    var price=$(".price");
    var discount=$(".discount");
    var total=$(".total");
    
    var gtotal=0;
    for(var i=0;i<qty.length;i++){
        var q=number_value(qty.eq(i).val());
        var p=number_value(price.eq(i).val());
        var d=number_value(discount.eq(i).val());
        var t=q*p;
        t=t-(t*d/100);
        console.log(q+":"+p+":"+d+":"+t);
        total.eq(i).val(number_format(t));
        
        gtotal+=t;
    }
    var shipping=$("#shipping_cost").val(); 
    gtotal+=parseInt(number_value(shipping));
    $("#subtotal").val(number_format(gtotal));
    $("#tax").val(number_format(gtotal*0.1));
    
    var unpaid=number_format(gtotal+(gtotal*0.1));
    $("#gtotal").val(unpaid);
    $("#unpaid_amount").val(unpaid);
}
</script>
@endpush
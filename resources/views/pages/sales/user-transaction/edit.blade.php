@extends("layouts.app")
@section("title","Transaction")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/usertransaction')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="{{url('/usertransaction/'.$so->id.'/print')}}"><i class="fa fa-print"></i> Print</a></li>
</ol>
@include("pages.sales.sales-order.edit-info")
@endsection
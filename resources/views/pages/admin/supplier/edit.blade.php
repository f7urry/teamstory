@extends("layouts.app")
@section("title","Supplier")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('supplier.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Update</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:openWindow('purchase-print.php');" id="btn_save"><i class="fa fa-print"></i> Cetak</a></li> -->
    </ol>
    <div class="card shadow">
    	<div class="card-body">
            <form method="post" class="row" id="formAdd" enctype="multipart/form-data" action="{{url('/supplier/'.$party->id)}}">
                {{csrf_field()}}
                {{method_field("patch")}}
                @include("pages.party.edit")
            </form>
       	</div>
    </div>
@endsection

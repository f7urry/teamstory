@extends("layouts.app")
@section("title","Pelanggan")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('customer.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Save</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:openWindow('purchase-print.php');" id="btn_save"><i class="fa fa-print"></i> Cetak</a></li> -->
    </ol>
    <div class="card shadow">
    	<div class="card-body">
            <form method="post" class="row" name="formAdd" enctype="multipart/form-data" id="formAdd" action="{{url('/customer')}}">
                {{csrf_field()}}
                <input type="hidden" name="party_role" value="CUSTOMER"/>
                @include("pages.party.add")
            </form>
       	</div>
    </div>
@endsection

@extends("layouts.popup")
@section("title","Customer Baru")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#" id="btn_save_popup" class="btn-save" data-form="#customerPopupForm" data-action="{{url('/popup/customer')}}" ><i class="fa fa-check"></i> Save</a></li>
</ol>
<div class="card shadow">
	<div class="card-body">
        <form id="customerPopupForm" method="post" class="row form-popup" name="formAdd" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="party_role" value="CUSTOMER"/>
            @include("pages.party.add")
        </form>
   	</div>
</div>
@endsection
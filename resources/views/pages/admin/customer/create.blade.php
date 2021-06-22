@extends("layouts.app")
@section("title","Customer")
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
                <div class="col-md-4">
                    @include("pages.admin.party.create")
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Username/Email Login</label>
                        <input type="text" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" name="re_password" class="form-control"/>
                    </div>
                </div>
            </form>
       	</div>
    </div>
@endsection

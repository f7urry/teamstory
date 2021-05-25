@extends("layouts.app")
@section("title","Driver")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('drivers.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Save</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:openWindow('purchase-print.php');" id="btn_save"><i class="fa fa-print"></i> Cetak</a></li> -->
    </ol>
    <form method="post" class="row" name="formAdd" enctype="multipart/form-data" id="formAdd" action="{{url('/drivers')}}">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    {{csrf_field()}}
                    <input type="hidden" name="party_role" value="DRIVER"/>
                    @include("pages.admin.party.create")
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <fieldset class="bg-white">
                    <label>Identity</label><br/>
                    <input type="file" name="identityimage"/>
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset class="bg-white">
                    <label>Driver Photo </label><br/>
                    <input type="file" name="photoimage"/>
                </fieldset>
            </div>
        </div>
    </form>
@endsection

@extends("layouts.app")
@section("title","Driver")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('drivers.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Update</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:openWindow('purchase-print.php');" id="btn_save"><i class="fa fa-print"></i> Cetak</a></li> -->
    </ol>
    <form method="post" class="row" id="formAdd" enctype="multipart/form-data" action="{{url('/drivers/'.$party->id)}}">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    {{csrf_field()}}
                    {{method_field("patch")}}
                    @include("pages.admin.party.edit")
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <fieldset class="bg-white">
                    <label>Identity</label><br/>
                    <a href="{{url('/file/view?f='.$party->image_id)}}" class="lightbox-image">
                        <img src="{{url('/file/view?f='.$party->image_id)}}" width="256px" class="img-thumbnail"/>
                    </a>
                    <br/><br/>
                    <input type="file" name="identityimage"/>
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset class="bg-white">
                    <label>Driver Photo </label><br/>
                    <a href="{{url('/file/view?f='.$party->image_party)}}" class="lightbox-image">
                        <img src="{{url('/file/view?f='.$party->image_party)}}" width="256px" class="img-thumbnail"/>
                    </a>
                    <br/><br/>
                    <input type="file" name="photoimage"/>
                </fieldset>
            </div>
        </div>
    </form>
@endsection

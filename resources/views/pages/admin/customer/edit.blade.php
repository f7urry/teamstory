@extends("layouts.app")
@section("title","Customer")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('customer.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Update</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:openWindow('purchase-print.php');" id="btn_save"><i class="fa fa-print"></i> Cetak</a></li> -->
    </ol>
    <form method="post" class="form" id="formAdd" enctype="multipart/form-data" action="{{url('/customer/'.$party->id)}}">
        {{csrf_field()}}
        {{method_field("patch")}}
        <div class="card shadow">
            <div class="card-header">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item flex-sm-fill text-sm-center"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-customer">Customer Information</a></li>
                    <li class="nav-item flex-sm-fill text-sm-center"><a class="nav-link" id="pills-detail-tab" data-toggle="pill" href="#pills-price">Item Price</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-price">
                        @include("pages.admin.custom-price.index")
                    </div>
                    <div class="tab-pane fade show active" id="pills-customer">
                        <div class="row">
                            <div class="col-md-4">  
                                @include("pages.admin.party.edit")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends("layouts.app")
@section("title","Request Booking")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('bookingrequest.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formAdd" class="btn-save" id="btn_save"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="card shadow">
    	<div class="card-body">
            <form method="post" class="row" name="formAdd" enctype="multipart/form-data" id="formAdd" action="{{url('/bookingrequest')}}">
                {{csrf_field()}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="text" class="form-control datetimepicker" name="date_from" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="text" class="form-control datetimepicker" name="date_to" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>Destination</label>
                        <input type="text" class="form-control" name="destination"/>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control" name="notes"/>
                    </div>
                </div>
            </form>
       	</div>
    </div>
    
@endsection

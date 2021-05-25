@extends("layouts.app")
@section("title","Booking")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('vehiclebookings.index')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" data-form="#formBook" class="btn-save" id="btn_save"><i class="fa fa-save"></i> Update</a></li>
        @if($booking->status=="REQUESTED")
            <li class="breadcrumb-item"><a href="#" data-form="#formBook" class="btn-save" id="btn_approve" data-action="javascript:approve()"><i class="fa fa-check"></i> Approve</a></li>
            <li class="breadcrumb-item"><a href="#" data-form="#formBook" class="btn-save" id="btn_reject" data-action="javascript:reject();"><i class="fa fa-times"></i> Reject</a></li>
        @endif
    </ol>
    <form method="post" class="row" id="formBook" enctype="multipart/form-data" action="{{url('/vehiclebookings/'.$booking->id)}}">
        <input type="hidden" name="status" value="{{$booking->status}}" id="status"/>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                {{csrf_field()}}
                {{method_field("patch")}}
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="text" class="form-control datepicker" name="date_from" value="{{$booking->date_from}}"/>
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="text" class="form-control datepicker" name="date_to" value="{{$booking->date_to}}"/>
                    </div>
                    <div class="form-group">
                        <label>Destination</label>
                        <input type="text" class="form-control" name="destination"  value="{{$booking->destination}}"/>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control" name="notes"  value="{{$booking->notes}}"/>
                    </div>
                    <div class="form-group">
                        <label>Request By</label>
                        <input type="text" class="form-control" disabled value="{{$booking->createdBy->name}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="form-group">
                        <label>Vehicle</label>
                        <select name="vehicle_id" class="form-control">
                            @foreach($vehicles as $val)
                                <option value="{{$val->id}}" {{$booking->vehicle_id==$val->id?"selected":""}}>{{$val->code." - ".$val->driver->party_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Actual Start</label>
                        <input type="text" class="form-control" disabled value="{{$booking->date_start}}"/>
                    </div>
                    <div class="form-group">
                        <label>Odometer Start</label>
                        <input type="text" class="form-control" disabled value="{{$booking->odometer_start}}"/>
                    </div>
                    <div class="form-group">
                        <label>Actual End</label>
                        <input type="text" class="form-control" disabled value="{{$booking->date_end}}"/>
                    </div>
                    <div class="form-group">
                        <label>Odometer End</label>
                        <input type="text" class="form-control" disabled value="{{$booking->odometer_end}}"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push("scripts")
    <script type="text/javascript">
        var id="{{$booking->id}}";
        function approve(){
            var url=base_url()+"/vehiclebookings/"+id;
            $("#formBook").attr('action',url);
            $("#status").val("APPROVED");
            $("#formBook").submit();
        }
        function reject(){
            var url=base_url()+"/vehiclebookings/"+id;
            $("#formBook").attr('action',url);
            $("#status").val("REJECTED");
            $("#formBook").submit();
        }
    </script>
@endpush

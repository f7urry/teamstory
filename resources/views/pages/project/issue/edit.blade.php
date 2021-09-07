@extends("layouts.app")
@section("title","Issue")
@section("content")
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/issue')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/issue/'.$issue->id)}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" class="row card-body" name="formAdd" id="formAdd">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group col-md-12">
                        <label>Due Date</label>
                        <input type="text" name="due_date" class="datepicker form-control" id="due_date" value="{{$issue->due_date}}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option {{$issue->status=="WAITING"?"selected":""}}>WAITING</option>
                            <option {{$issue->status=="IN PROGRESS"?"selected":""}}>IN PROGRESS</option>
                            <option {{$issue->status=="DONE"?"selected":""}}>DONE</option>
                            <option {{$issue->status=="ON TEST"?"selected":""}}>ON TEST</option>
                            <option {{$issue->status=="REJECTED"?"selected":""}}>REJECTED</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Project</label>
                        <select name="project_id" id="project">
                            <option value="{{$issue->project_id}}">{{$issue->project->project_name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" value="{{$issue->subject}}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{$issue->description}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $_select("#project", base_url()+"/api/project/options");
</script>
@endpush
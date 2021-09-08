@extends("layouts.app")
@section("title","Issue")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/issue')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/issue/'.$issue->id)}}"><i class="fa fa-check"></i> Update</a></li>
@endsection
@section("content")
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" class="card-body" name="formAdd" id="formAdd" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field("PATCH")}}
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="text" name="due_date" class="datepicker form-control" id="due_date" value="{{$issue->due_date}}" {{!Gate::check("is_delete")?"disabled":""}}/>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control"  {{!Gate::check("is_delete")?"disabled":""}}>
                            <option {{$issue->status=="WAITING"?"selected":""}}>WAITING</option>
                            <option {{$issue->status=="IN PROGRESS"?"selected":""}}>IN PROGRESS</option>
                            <option {{$issue->status=="DONE"?"selected":""}}>DONE</option>
                            <option {{$issue->status=="ON TESTING"?"selected":""}}>ON TESTING</option>
                            <option {{$issue->status=="REJECTED"?"selected":""}}>REJECTED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project</label>
                        <select name="project_id" id="project" {{!Gate::check("is_delete")?"disabled":""}}>
                            <option value="{{$issue->project_id}}">{{$issue->project->project_name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" value="{{$issue->subject}}"  {{!Gate::check("is_delete")?"disabled":""}}/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control rich-text" name="description">{{$issue->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Attachment 1
                            @if($issue->attachment_1!=null)
                                <a href="{{url('/file/view?f='.$issue->attachment_1)}}">(View Attachment)</a>
                            @endif
                        </label>
                        <input type="file" name="attachment_1" class="form-control-file"/>
                    </div>
                    <div class="form-group">
                        <label>Attachment 2
                            @if($issue->attachment_2!=null)
                                <a href="{{url('/file/view?f='.$issue->attachment_2)}}">(View Attachment)</a>
                            @endif
                        </label>
                        <input type="file" name="attachment_2" class="form-control-file"/>
                    </div>
                    <div class="form-group">
                        <label>Attachment 3
                            @if($issue->attachment_3!=null)
                                <a href="{{url('/file/view?f='.$issue->attachment_3)}}">(View Attachment)</a>
                            @endif
                        </label>
                        <input type="file" name="attachment_3" class="form-control-file"/>
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
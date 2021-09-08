@extends("layouts.app")
@section("title","Issue")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/issue')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/issue')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">New Issue</h4>
                </div>
                <div class="card-body">
                    <form method="post" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Project</label>
                            <select name="project_id" id="project"></select>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <br/>
                            <textarea class="form-control rich-text mt-2" name="description" row="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachment 1</label>
                            <input type="file" name="attachment_1" class="form-control-file"/>
                        </div>
                        <div class="form-group">
                            <label>Attachment 2</label>
                            <input type="file" name="attachment_2" class="form-control-file"/>
                        </div>
                        <div class="form-group">
                            <label>Attachment 3</label>
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
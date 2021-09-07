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
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Project</label>
                            <select name="project_id" id="project"></select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Attachment 1</label>
                            <input type="file" name="attachment_1" class="form-control"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Attachment 2</label>
                            <input type="file" name="attachment_2" class="form-control"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Attachment 3</label>
                            <input type="file" name="attachment_3" class="form-control"/>
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
@extends('layouts.app')
@section('title', 'New Access')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/useraccess')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-save"></i> Save</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <form name='frmUser' method="POST" action="{{url('/useraccess')}}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
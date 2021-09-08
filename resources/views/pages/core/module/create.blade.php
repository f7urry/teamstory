@extends('layouts.app')
@section('title', 'New Module Group')
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{url('/modules')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a href="javascript:document.frmUser.submit();"><i class="fa fa-save"></i> Save</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form name='frmUser' method="POST" action="{{url('/modules')}}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header bg-dark text-white">Group Information</div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name"/>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Parent') }}</label>
                                <select name="parent_id" class="form-control">
                                    <option value="">--ROOT--</option>
                                    @foreach($parents as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Icon') }}</label>
                                <input id="icon" type="text" class="form-control" name="fa_icon" value="fa-circle"/>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Menu Index') }}</label>
                                <input id="menu_index" type="text" class="form-control" name="menu_index" value="0"/>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Show Menu') }}</label>
                                <select name="is_menu" class="form-control">
                                    <option value="0">Hide</option>
                                    <option value="1" selected>Show</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

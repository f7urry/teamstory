<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/customer/'.$party->id.'updateaccount')}}"><i class="fa fa-check"></i> Update</a></li>
</ol>
<div class="row">
    <div class="col-md-12">
        <form id='formAdd' method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @php($user=$party->user)
                    @method('patch')
                    @csrf
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name" value="{{$user->name}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-4">
                            <input id="username" type="text" class="form-control" name="username" autocomplete="username" placeholder="Username" value="{{$user->username}}"/>
                        </div>
                    </div>

                    <div class="form-group form-control-md row">
                        <label class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-4">
                            <input id="email" type="text" class="form-control" name="email" autocomplete="email" placeholder="Email" value="{{$user->email}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <a href="{{url('/users/'.$user->id.'/changepass')}}">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
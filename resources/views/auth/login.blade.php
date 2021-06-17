@section("title","Login Panel")
@include("layouts.common.styles")
<body>
    <div class="body-bg"></div>
    <div class="container">
        <div class="row h-100 d-flex align-items-center justify-content-center">
            <div class="col-lg-4">
                <div class="card rounded shadow">
                    <div class="card-header text-center">
                        <img src="{{url('/assets/app/img/logo.png')}}" width="120px" />
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label text-dark">Username</label>
                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label text-dark">Password</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                            </div>
                            @if ($errors->any())
                                <br/>
                                <div class="alert alert-block alert-warning ">
                                    <strong>{{$errors->first()}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include("layouts.common.scripts")

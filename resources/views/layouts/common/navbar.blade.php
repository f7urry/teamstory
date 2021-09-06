<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
        </div>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-lg-inline"><i class="fa fa-bell"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a href="{{url('/profile')}}" class='dropdown-item'>No Notification Yet</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="border-left mr-3">&nbsp;</span>
                    <img class="img-profile rounded-circle mr-2" src="{{url('/file/view?f='.Auth::user()->avatar)}}" height="38px" />
                    <span class="mr-2 d-none d-lg-inline">{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a href="{{url('/profile')}}" class='dropdown-item'><i class='fa fa-user'></i> Profile</a>
                    <a href="#" class='dropdown-item' onclick="event.preventDefault();document.logoutform.submit();"><i class='fa fa-power-off'></i> Logout</a>
                </div>
            </li>
        </ul>
        <form name="logoutform" action="{{url('/logout')}}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
</nav>

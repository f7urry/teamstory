<nav class="sb-topnav navbar navbar-expand navbar-dark shadow">
    <a class="navbar-brand" href="#">
        <img src="{{url('/assets/app/img/logo.png')}}" height="38px" class="bg-white rounded">
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
       <!--  <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div> -->
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-white"><i class="fa fa-bell"></i></span> 
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a href="{{url('/profile')}}" class='dropdown-item'><i class='fa fa-user'></i> Profile</a>
                <a href="#" class='dropdown-item' onclick="event.preventDefault();document.logoutform.submit();"><i class='fa fa-power-off'></i> Logout</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="border-left mr-3">&nbsp;</span>
                <img class="img-profile rounded-circle mr-2" src="{{url('/file/view?f='.Auth::user()->avatar)}}" height="38px"/>
                <span class="mr-2 d-none d-lg-inline text-white">{{Auth::user()->name}}</span> 
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
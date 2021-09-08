<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center border-bottom">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{url('assets/app/img/logo.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    {!!MenuBuilder::generate()!!}
                </ul>
            </div>
        </div>
    </div>
</nav>

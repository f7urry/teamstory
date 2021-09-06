<div class="sidebar" data-color="orange" data-background-color="white">
    <div class="logo d-flex justify-content-center">
        <img src="{{url('assets/app/img/logo.png')}}" width="50%">
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            {!!MenuBuilder::generate()!!}
        </ul>
    </div>
</div>
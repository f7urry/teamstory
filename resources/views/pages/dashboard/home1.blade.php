@extends("layouts.app")
@section("title","Dashboard")
@section("content")
<br />
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <p class="card-category">Today</p>
                        <h3 class="card-title">2
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-exclamation-triangle text-danger"></i> &nbsp;
                            <a href="javascript:;">More...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <p class="card-category">Due Task</p>
                        <h3 class="card-title">4
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-exclamation-triangle text-danger"></i> &nbsp;
                            <a href="javascript:;">More...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <p class="card-category">Upcoming Task</p>
                        <h3 class="card-title">20
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-exclamation-triangle text-danger"></i> &nbsp;
                            <a href="javascript:;">More...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <p class="card-category">Monthly Complete</p>
                        <h3 class="card-title">100
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-exclamation-triangle text-danger"></i> &nbsp;
                            <a href="javascript:;">More...</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Upcoming Task</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="unpaidinvoice">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Task Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="sales_chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include("layouts.common.styles")
<body>
    <div class="print-remove row navbar">
        <div class="col-md-12 pt-2">
            <div class="btn-toolbar justify-content-center" role="toolbar">
                <div class='btn-group ml-2' role="group">
                     <button onclick="javascript:history.back();" type="button" class="btn btn-default">
                        <span class='fa fa-arrow-left'></span>&nbsp;Back
                    </button>
                    <button onclick="javascript:window.print();" type="button" class="btn btn-success">
                        <span class='fa fa-print'></span>&nbsp;Print
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="page-wrapper" class="d-flex justify-content-center">
        @yield("content")
    </div>
</body>
@push("scripts")
<script type="text/javascript" src="{{url('/assets/app/js/print.js')}}"></script>
@endpush
@include("layouts.common.scripts")

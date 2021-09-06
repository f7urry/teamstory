<script src="{{url('/assets/jquery/jquery.min.js')}}"></script>
<script src="{{url('/assets/moment/moment.min.js')}}"></script>
<script src="{{url('/assets/jquery-number/jquery.number.js')}}"></script>
<script src="{{url('/assets/jquery-form/jquery-form.min.js')}}"></script>
<script src="{{url('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{url('/assets/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/assets/chart.js/Chart.min.js')}}"></script>
<script src="{{url('/assets/sparklines/sparkline.js')}}"></script>
<script src="{{url('/assets/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{url('/assets/ekko-lightbox/ekko-lightbox.js')}}"></script>
<script src="{{url('/assets/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('/assets/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('/assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{url('/assets/fontawesome-free/js/all.min.js')}}"></script>
<script src="{{url('/assets/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('/assets/filesaver/FileSaver.min.js')}}"></script>
<script src="{{url('/assets/sheetjs/xlsx.core.min.js')}}"></script>
<script src="{{url('/assets/table-export/tableExport.min.js')}}"></script>

<script src="{{url('/assets/material/js/material-dashboard.js')}}"></script>
<script src="{{url('/assets/app/js/number.js')}}"></script>
<script src="{{url('/assets/app/js/dialog.js')}}"></script>
<script src="{{url('/assets/app/js/datepicker.js')}}"></script>
<script src="{{url('/assets/app/js/app.js')}}"></script>
<script type="text/javascript">
    function base_url(){
        return "{{url('/')}}";
    }
    function csrf_token(){
        return "{{csrf_token()}}";
    }
    $(document).ready(function(){
        $(".preloader").fadeOut();
    });
</script>
@stack("scripts")
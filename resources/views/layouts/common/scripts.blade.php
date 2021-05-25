<script src="{{url('/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/assets/plugins/jquery-number/jquery.number.js')}}"></script>
<script src="{{url('/assets/plugins/jquery-form/jquery-form.min.js')}}"></script>
<script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/plugins/gijgo/js/gijgo.min.js')}}"></script>
<script src="{{url('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/assets/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('/assets/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{url('/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{url('/assets/plugins/ekko-lightbox/ekko-lightbox.js')}}"></script>
<script src="{{url('/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{url('/assets/plugins/fontawesome-free/js/all.min.js')}}"></script>
<script src="{{url('/assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('/assets/plugins/sb-admin/js/scripts.js')}}"></script>
<script src="{{url('/assets/js/number.js')}}"></script>
<script src="{{url('/assets/js/dialog.js')}}"></script>
<script src="{{url('/assets/js/datepicker.js')}}"></script>
<script src="{{url('/assets/js/app.js')}}"></script>
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
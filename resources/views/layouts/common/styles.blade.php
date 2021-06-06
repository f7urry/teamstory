<head>
    <title>{{env("APP_NAME")}} - @yield("title")</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <meta name="description" content="" />
    <meta name="author" content="HPYSolution" />

    <link rel="shortcut icon" href="{{url('/assets/img/favicon.png')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/fontawesome-free/css/all.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/bootstrap/css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/jqvmap/jqvmap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/summernote/summernote-bs4.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/sb-admin/css/styles.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/select2/css/select2.min.css')}}">   
    <link type="text/css" rel="stylesheet" href="{{url('/assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/css/app.css')}}"/>
    @stack("styles")
</head>
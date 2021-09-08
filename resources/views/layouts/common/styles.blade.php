<head>
    <title>{{env("APP_NAME")}} - @yield("title")</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <meta name="description" content="" />
    <meta name="author" content="HPYSolution" />

    <link rel="shortcut icon" href="{{url('/assets/img/favicon.png')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/fontawesome-free/css/all.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/bootstrap/css/bootstrap.min.css')}}"/> 
    <link type="text/css" rel="stylesheet" href="{{url('/assets/jquery.scrollbar/jquery.scrollbar.css')}}"/> 
    <!-- 
    -->
    <link type="text/css" rel="stylesheet" href="{{url('/assets/datatables-bs4/css/dataTables.bootstrap4.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('/assets/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/jqvmap/jqvmap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/summernote/summernote-bs4.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/select2/css/select2.min.css')}}">   
    <link type="text/css" rel="stylesheet" href="{{url('/assets/ekko-lightbox/ekko-lightbox.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/argon/css/argon.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{url('/assets/app/css/app.css')}}"/>
    @stack("styles")
</head>
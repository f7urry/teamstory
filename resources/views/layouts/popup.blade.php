<body id="page-top">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield("title")</h1>
    </div>
    @yield("content")
</body>
<script type="text/javascript">
    $("#btn_close_popup").click(function(e){
        e.preventDefault();
        closePopup("{{request()->popupid}}");
    });
    $_popupForm("{{request()->popupid}}");
    $_ui();
</script>
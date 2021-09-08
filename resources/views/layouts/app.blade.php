<html lang="en">
    @include("layouts.common.styles")
    <body>
        <div class="body-bg"></div>
        <div class="preloader">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        @include("layouts.common.sidebar")
        <div class="main-content" id="panel">
            @include("layouts.common.navbar")
            <div class="container-fluid">
                @include("layouts.common.alert")
                @yield("content")
                @include("layouts.common.footer")
            </div>
        </div>
        @include("layouts.common.scripts")
    </body>
</html>
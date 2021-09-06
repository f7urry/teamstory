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
        <div class="main-panel">
            @include("layouts.common.navbar")
            <div class="content">
                <div class="container-fluid">
                    @include("layouts.common.alert")
                    @yield("content")
                </div>
            </div>
            @include("layouts.common.footer")
        </div>
        @include("layouts.common.scripts")
    </body>
</html>
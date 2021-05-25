<html lang="en">
    @include("layouts.common.styles")
    <body>
        <div class="preloader">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        @include("layouts.common.navbar")
        <div id="layoutSidenav">
            @include("layouts.common.sidebar")
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid pt-3">
                        <h1>@yield("title")</h1>
                        @include("layouts.common.alert")
                        @yield("content")
                    </div>
                </main>
            </div>
        </div>
        @include("layouts.common.scripts")
    </body>
</html>
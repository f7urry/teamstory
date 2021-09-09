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
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-md-12">
                            <h6 class="h2 text-white d-inline-block mb-0">@yield("title")</h6>
                            <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                                @hasSection('breadcrumb')
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    @yield("breadcrumb")
                                </ol>
                                @endif
                            </nav>
                        </div>
                        <!-- 
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">Button</a>
                        </div> 
                        -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--6">
            @include("layouts.common.alert")
            @yield("content")
            @include("layouts.common.footer")
        </div>
    </div>
    @include("layouts.common.scripts")
</body>

</html>

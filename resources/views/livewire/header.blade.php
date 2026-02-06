<div>
    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end -->
    <!-- Start Switcher -->
    {{-- <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
            <div class="form_holder">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a href="#" data-switchcolor="color1" class="styleswitch"
                                    style="background-color:#f76d2b;"> </a>
                                <a href="#" data-switchcolor="color2" class="styleswitch"
                                    style="background-color:#de483d;"> </a>
                                <a href="#" data-switchcolor="color3" class="styleswitch"
                                    style="background-color:#228dcb;"> </a>
                                <a href="#" data-switchcolor="color4" class="styleswitch"
                                    style="background-color:#00bff3;"> </a>
                                <a href="#" data-switchcolor="color5" class="styleswitch"
                                    style="background-color:#2dcc70;"> </a>
                                <a href="#" data-switchcolor="color6" class="styleswitch"
                                    style="background-color:#6054c2;"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Switcher -->

    <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                @if ($headerInfo && $headerInfo->address)
                    <div class="col-md-4 col-xs-6">
                        <div class="b-topBar__addr">
                            <span class="fa fa-map-marker"></span>
                            {{-- 202 W 7TH ST, LOS ANGELES, CA 90014 --}}
                            {{ $headerInfo->address }}
                        </div>
                    </div>
                @endif

                @if ($headerInfo && $headerInfo->phone)
                    <div class="col-md-2 col-xs-6">
                        <div class="b-topBar__tel">
                            <span class="fa fa-phone"></span>
                            {{ $headerInfo->phone }}
                        </div>
                    </div>
                @endif
                <div class="col-md-4 col-xs-6">
                    <nav class="b-topBar__nav">
                        <ul>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Sign in</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</div>

<div>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Auto Club</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <link href="{{ asset('assets/css/master.css') }}  " rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css"
        href="{{ asset('assets/assets/switcher/css/switcher.css') }}" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color1.css') }}"
        title="color1" media="all" data-default-color="true" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color2.css') }}"
        title="color2" media="all" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color3.css') }}"
        title="color3" media="all" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color4.css') }}"
        title="color4" media="all" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color5.css') }}"
        title="color5" media="all" />

    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/assets/switcher/css/color6.css') }}"
        title="color6" media="all" />

    @stack('extra-scripts')

    @livewireStyles
</head>
<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
    <livewire:header />
    {{ $slot }}
    <livewire:footer />
    @livewireScripts
    {{-- <script defer src="./assets/vendor/nouislider/dist/nouislider.min.js"></script> --}}
    <script defer  src="{{ asset('assets/js/jquery-latest.js') }}"></script>
    <script defer src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
    <script defer  src="{{ asset('assets/assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/classie.js') }}"></script>

    <!-- Switcher -->
    <script defer  src="{{ asset('assets/assets/switcher/js/switcher.js') }}"></script>

    <!-- Owl Carousel -->
    <script defer  src="{{ asset('assets/assets/owl-carousel/owl.carousel.min.js') }}"></script>

    <!-- bxSlider -->
    <script defer src="{{ asset('assets/assets/bxslider/jquery.bxslider.js') }}"></script>

    <!-- jQuery UI Slider -->
    <script defer  src="{{ asset('assets/assets/slider/jquery.ui-slider.js') }}"></script>
    <!-- Theme -->
    <script defer  src="{{ asset('assets/js/jquery.smooth-scroll.js') }}"></script>
    <script defer  src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/jquery.placeholder.min.js') }}"></script>
    <script defer  src="{{ asset('assets/js/theme.js') }}"></script>
    @stack('ymgcustom')
</body>

</html>
</div>

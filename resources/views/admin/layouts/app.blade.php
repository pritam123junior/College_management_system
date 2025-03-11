<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('css/hope-ui.min.css?v=2.0.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/custom.min.css?v=2.0.0') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('css/dark.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('css/rtl.min.css') }}" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- snapAlert -->
    <link rel="stylesheet" href="{{ asset('css/snapAlert.min.css') }}" />
    <script src="{{ asset('js/snap-alert.min.js') }}"></script>

    <script>
        SnapAlert().SnapOptions({
            duration: 2000,
            isDark: false,
            position: 'top right'
        });
    </script>

</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>

    <!-- loader END -->
    @include('admin.layouts.sidebar')

    <main class="main-content">
        <div class="position-relative iq-banner">
            @include('admin.layouts.navbar')
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                @yield('content')
            </div>
        </div>


    </main>
    <!-- Wrapper End-->

    @include('admin.layouts.offcanvas')

    <!-- Library Bundle Script -->
    <script src="{{ asset('js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('js/charts/vectore-chart.js') }} "></script>
    <script src="{{ asset('js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->
    <script src="{{ asset('vendor/aos/dist/aos.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('js/hope-ui.js') }}" defer></script>

    @stack('scripts')


</body>

</html>

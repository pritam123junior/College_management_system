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


</head>

<body>
 <!-- loader Start -->
    
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

</body>

</html>

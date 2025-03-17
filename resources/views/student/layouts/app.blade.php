<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student</title>

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


    <style>
        .content-item-action:hover {
            color: green;
        }
       
    </style>

    <script>
        $(document).ready(function() {

            SnapAlert().SnapOptions({
                duration: 3000,
                isDark: false,
                position: 'top right'
            });

            $(document).on('click', '.content-item-show-action', function() {
                event.preventDefault();

                if ($(this).hasClass('bi-plus-square-fill')) {
                    $(this).removeClass('bi-plus-square-fill');
                    $(this).addClass('bi-dash-square-fill');
                    $(this).css('color', 'darkred');

                } else if ($(this).hasClass('bi-dash-square-fill')) {
                    $(this).removeClass('bi-dash-square-fill');
                    $(this).addClass('bi-plus-square-fill');
                    $(this).css('color', 'darkgreen');

                }


                $(this).siblings('.content-item').toggleClass('d-none');


            });

            $(document).on('click', '.content-item-action', function() {
                event.preventDefault();
                $(this).css('color', 'green');
                let key_data = $(this).siblings('.content-key').val();
                let src_data='https://www.youtube.com/embed/'+key_data;                
                $(".content-youtube-iframe").attr("src", src_data);

            });

            $(".add-input-text-btn").on("click", function(event) {
                event.preventDefault();
                $("#dynamic-input-text").append(
                    '<div class="form-group"><label class="form-label">Section</label><input type="text" class="form-control" name="section[]"><button type="button" class="add-input-text-btn btn btn-secondary"><i class="bi bi-plus-circle-fill"></i></button><button type="button" class="add-input-text-btn btn btn-danger"><i class="bi bi-dash-circle-fill"></i></button></div>'
                    );
            });

            @if (session()->has('success'))
                setTimeout(() => {

                    SnapAlert().success('Success', "{{ session('success') }}");

                }, "800");
            @endif

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
    {{-- delete modal --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Are you sure to you want to delete?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="POST" class="d-inline delete-confirm-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('student.layouts.sidebar')

    <main class="main-content">
        <div class="position-relative iq-banner">
            @include('student.layouts.navbar')
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                @yield('content')
            </div>
        </div>


    </main>
    <!-- Wrapper End-->

    {{--   @include('student.layouts.offcanvas') --}}

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

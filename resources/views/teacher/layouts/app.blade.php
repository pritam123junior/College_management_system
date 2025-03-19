<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher</title>

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

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            SnapAlert().SnapOptions({
                duration: 3000,
                isDark: false,
                position: 'top right'
            });

             $(".view-file-content-btn").on("click", function(event) {
                event.preventDefault();
                let file_data = $(this).siblings('.file-data').val();
                let file_mime_data = $(this).siblings('.file-mime-data').val();
                $(".view-file-content").attr("type", file_mime_data);
                $(".view-file-content").attr("data", file_data);
            });

            $(".view-youtube-content-btn").on("click", function(event) {
                event.preventDefault();
                let key_data = $(this).siblings('.content-key').val();
                let src_data = 'https://www.youtube.com/embed/' + key_data;
                $(".content-youtube-iframe").attr("src", src_data);
            });

            $("#content-type").on("change", function(event) {
                event.preventDefault();
                $("#content-type-form").trigger("submit");
            });

              $(document).on('click', '.add-question-btn', function() {
                event.preventDefault();
              let question_number=  $('.question-number').val();
              let i=2;
                while(question_number>0){
                    $(".question-list").append(
                        '<section class="bg-light p-4 single-question"><div class=form-group><label class=form-label for=name>Question '+i+'</label> <input class=form-control id=name name=name placeholder="Enter Question"required></div><div class=form-group><label class=form-label for=name>Option 1</label> <input class=form-control id=name name=name placeholder="Enter Option 1"required></div><div class=form-group><label class=form-label for=name>Option 2</label> <input class=form-control id=name name=name placeholder="Enter Option 2"required></div><div class=form-group><label class=form-label for=name>Option 3</label> <input class=form-control id=name name=name placeholder="Enter Option 3"required></div><div class=form-group><label class=form-label for=name>Option 4</label> <input class=form-control id=name name=name placeholder="Enter Option 4"required></div><div class=form-group><label class=form-label for=name>Correct Option</label> <select class=form-control name="Correct Option"required><option value="Option 1">Option 1<option value="Option 2">Option 2<option value="Option 3">Option 3<option value="Option 4">Option 4</select></div><div class=form-group><label class=form-label for=name>Solution</label> <input class=form-control id=name name=name placeholder=Solution required></div></section>'
                    );
                    question_number--;
                    i++;
                }
               
            });

          
           

            $(document).on('click', '.add-input-text-btn', function() {
                event.preventDefault();
                $("#dynamic-input-text").append(
                    '<div class="dynamic-input form-group"><label class="form-label">Section</label><input type="text" class="form-control" name="sections[]"><button type="button" class="mt-2 add-input-text-btn btn btn-secondary btn-sm"><i class="bi bi-plus-circle-fill"></i></button><button type="button" class="remove-input-text-btn btn btn-danger btn-sm mt-2" style="margin-left:.5rem !important"><i class="bi bi-dash-circle-fill"></i></button></div>'
                );
            });

            $(document).on('click', '.remove-input-text-btn', function() {
                event.preventDefault();
                $(this).parent('div.dynamic-input').remove();
            });

            $(".delete-btn").on("click", function(event) {
                event.preventDefault();
                let link = $(this).siblings('.row-id').val();
                $(".delete-confirm-form").attr("action", link);
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

        <!-- View File Content Modal -->
    <div class="modal fade" id="viewFileContentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Content</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <object class="view-file-content" type="" data="" width="100%" height="100%">
                    </object>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- View Youtbe Content Modal -->
    <div class="modal fade" id="viewYoutbeContentModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Content</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="100%" src="" class="content-youtube-iframe"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    @include('teacher.layouts.sidebar')

    <main class="main-content">
        <div class="position-relative iq-banner">
            @include('teacher.layouts.navbar')
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                @yield('content')
            </div>
        </div>


    </main>
    <!-- Wrapper End-->

    {{--   @include('teacher.layouts.offcanvas') --}}

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

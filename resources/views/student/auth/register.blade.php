<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Register</title>

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="{{asset('images/auth/01.png')}}" class="img-fluid gradient-main animated-scaleX" alt="cimages">
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                                <div class="card-body">
                                    <a href="" class="navbar-brand d-flex mb-3" style="flex-direction:column;place-items:center;">
                                        <!--Logo start-->
                                        <!--logo End-->
                                        
                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                              <img src="{{ asset('images/logo.png') }}" style="width:4rem;height:4rem;">
                                            </div>
                                            <div class="logo-mini">
                                              <img src="{{ asset('images/logo.png') }}" style="width:4rem;height:4rem;">
                                            </div>
                                        </div>
                                        <!--logo End-->
                                        <div class="mt-2"><h4 class="logo-title" style="color:darkred;">Ronit School & College</h4></div>
                                       
                                        
                                        
                                       
                                     </a>                                                                     
                                    <h3 class="pb-3 text-center">Student Register</h3>         
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif                         
                                    <form class="pt-2" action="{{ url('register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="student_id" class="form-label">Student ID</label>
                                                    <input type="text" class="form-control" id="student_id"
                                                        placeholder="Enter your Student ID" name="student_id">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fullName" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="fullName"
                                                        placeholder="Enter your name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="mobile" class="form-label">Mobile No.</label>
                                                    <input type="text" class="form-control" id="mobile"
                                                        placeholder="Enter your mobile no" name="mobile">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Enter password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="confirm-password" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control" name="confirm_password"
                                                        id="confirm-password" placeholder="Enter password again">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="class_id" class="form-label">Class</label>
                                                    <select name="class_id" id="class_id" class="form-control "
                                                        required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="section_id" class="form-label">Section</label>
                                                    <select name="section_id" id="section_id" class="form-control "
                                                        required>
                                                        <option value="">Select Section</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                        <p class="mt-3 text-center">
                                            Already registered? <a href="{{ route('login') }}"
                                                class="text-underline">Login</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg sign-bg-right">
                        <svg width="280" height="230" viewBox="0 0 421 359" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8" />
                                <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 149.47 319.328)" fill="#3A57E8" />
                                <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857"
                                    transform="rotate(45 203.936 99.543)" fill="#3A57E8" />
                                <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(45 204.316 -229.172)" fill="#3A57E8" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </div>

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

    <script>
        $(document).ready(function() {

            $("#class_id").on("change", function() {

                $("#section_id").html("");
                $("#section_id").html('<option value="">Select Section</option>');

                $.ajax({

                    url: "{{ route('ajaxdata.section') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        class_id: $("#class_id option:selected").val()
                    },
                    success: function(data) {
                        for (const item of data) {
                            let html_code = '<option value="' + item.id + '">' + item.name +
                                '</option>';
                            $("#section_id").append(html_code);
                        }
                    }

                });

            });
        });
    </script>

</body>

</html>

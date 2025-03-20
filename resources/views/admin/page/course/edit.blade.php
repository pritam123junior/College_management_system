@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Course</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $course->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $course->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ $course->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="section_name" class="form-label">Section</label>
                            <select name="section_name" id="section_name" class="form-control" required>
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->name }}"
                                        {{ $course->section_name == $section->name ? 'selected' : '' }}>{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value ="">Select Type</option>

                                <option value="Paid" {{ $course->type == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Free" {{ $course->type == 'Free' ? 'selected' : '' }}>Free</option>
                            </select>
                        </div>
                        <div class="form-group priceshow @if ($course->type == 'Free') d-none @endif">
                            <label for="price" class="form-label">Price (BDT)</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $course->price }}">
                        </div>

                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#type").on("change", function() {

            let type = $("#type option:selected").val();

            if (type === 'Paid') {



                $('.priceshow').removeClass("d-none");

                $("#price").attr("required", true);



            } else if (type === 'Free') {


                $('.priceshow').addClass("d-none");

                $("#price").attr("required", false);



            }



        });

        $("#class_id").on("change", function() {

            $("#section_name").html("");
            $("#section_name").html('<option value="">Select Section</option>');

            $.ajax({

                url: "{{ route('admin.ajaxdata.section') }}",
                type: "GET",
                data: {
                    class_id: $("#class_id option:selected").val()
                },
                success: function(data) {
                    for (const item of data) {
                        let html_code = '<option value="' + item.name + '">' + item.name +
                            '</option>';
                        $("#section_name").append(html_code);
                    }
                }

            });

        });
    </script>
@endpush

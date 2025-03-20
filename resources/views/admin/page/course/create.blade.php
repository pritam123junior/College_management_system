@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Course</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="section_name" class="form-label">Section</label>
                            <select name="section_name" id="section_name" class="form-control " required>
                                <option value="">Select Section</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value ="">Select Type</option>
                                <option value="Paid">Paid</option>
                                <option value="Free">Free</option>
                            </select>
                        </div>
                        <div class="form-group priceshow d-none">
                            <label>Price (BDT)</label>
                            <input type="number" name="price" class="form-control" id="price" step="any">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>                        
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



            } else {

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

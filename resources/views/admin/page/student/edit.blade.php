@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Student</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student.update', $student->id) }}" method="POST" id="editStudentForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="text" name="student_id" id="student_id" class="form-control"
                                placeholder="Enter Student ID" value="{{ $student->id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Student Name" value="{{$student->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Student Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter Student Password" value="">
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile Number (Optional)</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"
                                placeholder="Enter Mobile Number" value="{{$student->user?->mobile}}">
                        </div>
                        <div class="form-group">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{$class->id===$student->class_id?'selected':''}}>{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="section_id" class="form-label">Section</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{$section->id===$student->section_id?'selected':''}}>{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="approve_status" class="form-label">Approve Status</label>
                            <select name="approve_status" id="approve_status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Approved" {{'Approved'==$student->user->approve_status?'selected':''}}>Approved</option>
                                <option value="Not Approved" {{'Not Approved'==$student->user->approve_status?'selected':''}}>Not Approved</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $("#class_id").on("change", function() {

                $("#section_id").html("");
                $("#section_id").html('<option value="">Select Section</option>');

                $.ajax({

                    url: "{{ route('admin.ajaxdata.section') }}",
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
@endpush

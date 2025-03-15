@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Content</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="">Select Course</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type_id" class="form-label">Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">Select Type</option>
                                <option value="file">File</option>
                                <option value="youtube_link">Youtube Link</option>
                            </select>
                        </div>
                        <div class="content-upload-show d-none">
                            <div class="form-group">
                                <label for="file_content" class="form-label">File Upload(max:50MB)</label>
                                <input type="file" name="file_content" class="form-control" required>
                            </div>
                        </div>
                        <div class="youtube-link-show d-none">
                            <div class="form-group">
                                <label for="youtube_link" class="form-label">Youtube link</label>
                                <input type="text" name="youtube_link" class="form-control" id="youtube_link" required>
                            </div>
                            <div class="form-group">
                                <label>Group Name</label>
                                <select class="single_tag_select" name="group_name" required>
                                    @foreach ($youtube_groups as $youtube_group)
                                        <option value="{{ $youtube_group->id }}">{{ $youtube_group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
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

                $("#course_id").html("");
                $("#course_id").html('<option value="">Select Course</option>');

                $.ajax({

                    url: "{{ route('admin.ajaxdata.course') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        class_id: $("#class_id option:selected").val()
                    },
                    success: function(data) {
                        for (const item of data) {
                            let html_code = '<option value="' + item.id + '">' + item.name +
                                '</option>';
                            $("#course_id").append(html_code);
                        }
                    }

                });

            });

            $("#type_id").on("change", function() {

                let type = $("#type_id option:selected").val()

                if (type == 'file') {
                    $('#content-upload-show').toggleClass("d-none");
                }
                elseif(type == 'youtube_link') {
                    $('#youtube-link-show').toggleClass("d-none");
                }



            });

        });
    </script>
@endpush

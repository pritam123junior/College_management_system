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
                    <form action="{{ route('admin.course.content.store', $course_id) }}" method="POST"
                        enctype="multipart/form-data">
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
                            <label for="type_id" class="form-label">Type</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="file">File</option>
                                <option value="youtube_link">Youtube Link</option>
                            </select>
                        </div>
                        <div class="content-upload-show d-none">
                            <div class="form-group">
                                <label for="file_content" class="form-label">File Upload(max:50MB)</label>
                                <input type="file" name="file_content" class="form-control" id="file_content">
                            </div>
                        </div>
                        <div class="youtube-link-show d-none">
                            <div class="form-group">
                                <label for="youtube_link" class="form-label">Youtube link</label>
                                <input type="text" name="youtube_link" class="form-control" id="youtube_link">
                            </div>
                            <div class="form-group">
                                <label for="group_id" class="form-label">Group Name</label>
                                <select id="group_id" class="form-control" name="group_id">
                                    <option value="">Select Group</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
        $("#type_id").on("change", function() {

            let type = $("#type_id option:selected").val();

            if (type === 'file') {
                if ($('.content-upload-show').hasClass("d-none")) {
                    $('.content-upload-show').removeClass("d-none");

                }

                $('.youtube-link-show').addClass("d-none");
                $("#file_content").attr("required", true);
                $("#youtube_link").attr("required", false);



            } else if (type === 'youtube_link') {

                if ($('.youtube-link-show').hasClass("d-none")) {
                    $('.youtube-link-show').removeClass("d-none");

                }

                $('.content-upload-show').addClass("d-none");
                $("#youtube_link").attr("required", true);
                $("#group_id").attr("required", true);
                $("#file_content").attr("required", false);

            } else {
                $('.content-upload-show').addClass("d-none");
                $('.youtube-link-show').addClass("d-none");
                $("#youtube_link").attr("required", false);
                $("#group_id").attr("required", false);
                $("#file_content").attr("required", false);
            }



        });
    </script>
@endpush

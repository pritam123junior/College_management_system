@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Content List{{ $selected_type === 'file' ? '(File)' : '(Youtube)' }}</h4>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.course.content.create', $course_id) }}"
                            class="btn btn-primary mb-2 w-100">Add Content</a>
                        <form id="content-type-form">
                            <select name="type" id="content-type" class="form-control" required>
                                <option value="">Select Content Type</option>
                                <option value="youtube" {{ $selected_type === 'youtube' ? 'selected' : '' }}>Youtube Content
                                </option>
                                <option value="file" {{ $selected_type === 'file' ? 'selected' : '' }}>File Content</option>
                            </select>                            
                        </form>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($contents as $content)
                            <div class="col">


                                <div class="card">
                                    <div class="card-header py-3" style="background-color:lightblue;">
                                        <h5 class="text-center">{{ $content->name }}</h5>
                                    </div>
                                    <div class="card-body" style="background-color:lavender">
                                        @if ($content->user?->type == 'Admin')
                                            <span class="card-text">Author: Admin</span><br>
                                        @elseif($content->user?->type == 'Teacher')
                                            <span class="card-text">Uploader: {{ $content->teacher?->name }}</span><br>
                                        @endif
                                        @if ($content->file_type === 'png')
                                            <span class="card-text">File type: Image</span><br>
                                        @endif
                                        <span class="card-text">Added:
                                            {{ \Carbon\Carbon::parse($content->created_at)->format('d M, Y') }}</span>                                     

                                    </div>
                                    <div class="card-footer" style="background-color:lightsteelblue">
                                        @if ($content->type === 'file')
                                        <input type="hidden" class="file-mime-data" value="{{ Storage::mimeType($content->path) }}">    
                                        <input type="hidden" class="file-data" value="data:{{ Storage::mimeType($content->path)}};base64,{{base64_encode(Storage::get($content->path))}}">
                                            <button type="button" class="btn btn-primary btn-sm view-file-content-btn"
                                                data-bs-toggle="modal" data-bs-target="#viewFileContentModal">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        @else
                                            <input type="hidden" class="content-key" value="{{ $content->key }}">
                                            <button type="button" class="btn btn-primary btn-sm view-youtube-content-btn"
                                                data-bs-toggle="modal" data-bs-target="#viewYoutbeContentModal">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        @endif
                                        @if ($content->type === 'file')
                                            <a href="{{ route('admin.course.content.download', $content->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
                                        @endif
                                        <input type="hidden" class="row-id"
                                            value="{{ route('admin.course.content.destroy', $content->id) }}">
                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

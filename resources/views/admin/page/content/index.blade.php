@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Content List</h4>
                    </div>
                    <a href="{{ route('admin.course.content.create',$course_id) }}" class="btn btn-primary">Add Content</a>
                </div>
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($contents as $content)
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        @if (in_array($content->file_type, ['png', 'jpg', 'jpeg', 'gif']))
                                            <h5 class="card-title"><i class="bi bi-image"></i></h5>
                                           
                                        @elseif(in_array($content->file_type, ['mp3']))
                                            <h5 class="card-title"><i class="bi bi-music-note"></i> Audio File</h5>
                                           
                                            
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $content->name }}</h5>
                                        <span class="card-text">Description: {{ $content->description }}</span>
                                        </br>
                                        <span class="card-text">Class: {{ $content->class?->name }}</span> </br>
                                        <span class="card-text">Course: {{ $content->course?->name }}</span> </br>
                                        @if ($content->user?->type == 'Admin')
                                            <span class="card-text">Uploaded by: Admin</span> </br>
                                        @elseif($content->user?->type == 'Teacher')
                                            <span class="card-text">Uploaded By: {{ $content->teacher?->name }}</span> </br>
                                        @endif
                                        <span>Date:{{ $content->created_at }}</span> </br>
                                        <button type="button" class="btn btn-primary btn-sm view-content-btn"
                                            data-bs-toggle="modal" data-bs-target="#viewContentModal">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        @if ($content->type === 'file')
                                            <a href="{{ route('admin.course.content.download', $content->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
                                        @endif
                                    </div>
                                    <div class="card-footer text-muted">
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

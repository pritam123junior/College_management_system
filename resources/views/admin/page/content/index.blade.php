@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Content List</h4>
                    </div>
                    <a href="{{ route('admin.content.create') }}" class="btn btn-primary">Add Content</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Size</th>                                    
                                    <th>Class</th>
                                    <th>Course</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $content->name }}</td>
                                        <td>{{ $content->type }}</td>
                                        <td>{{ $content->size }}</td>
                                        <td>{{ $content->class->name }}</td>
                                        <td>{{ $content->course->name }}</td>
                                        <td>{{ $content->created_at }}</td>

                                        <td>
                                            <a href="{{ route('admin.course.edit', $course->id) }}"
                                                class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                                            <input type="hidden" class="row-id"
                                                value="{{ route('admin.course.destroy', $course->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

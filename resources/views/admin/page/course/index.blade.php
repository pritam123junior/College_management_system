@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Course List</h4>
                    </div>
                    <a href="{{ route('admin.course.create') }}" class="btn btn-primary">Add Course</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Class</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Type</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->description }}</td>
                                        <td>{{ $course->class?->name }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td>{{ ucfirst($course->type) }}</td>

                                        <td>
                                            <a href="{{ route('admin.course.edit', $course->id) }}"
                                                class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                                            <input type="hidden" class="row-id"
                                                value="{{ route('admin.course.destroy', $course->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                            <a href="{{ route('admin.course.', $course->id) }}"
                                                class="btn btn-warning btn-sm"> <i class="bi bi-file-plus"></i></a>
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

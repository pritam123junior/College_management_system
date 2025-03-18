@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Group List</h4>
                    </div>
                    <a href="{{ route('admin.course.group.create',$id) }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> Add
                        group</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->course?->name }}</td>
                                        <td>{{ $group->course?->class?->name }}</td>
                                 
                                        
                                        <td>
                                            <a href="{{ route('admin.course.group.edit', $group->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <input type="hidden" class="row-id"
                                                value="{{ route('admin.course.group.destroy', $group->id) }}">
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

@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Student List</h4>
                    </div>
                    <a href="{{ route('admin.student.create') }}" class="btn btn-primary">Add Student</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>  
                                    <th>Mobile</th>                   
                                    <th>Class</th>
                                    <th>Section</th>                                   
                                    <th>Approve Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>  
                                        <td>{{ $student->moblie}}</td>      
                                        <td>{{ $student->class?->name }}</td>
                                        <td>{{ $student->section?->name }}</td>                                      
                                        <td>{{$student->approve_status}}</td>
                                        <td>
                                            <a href="{{ route('admin.student.edit', $student->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-people"></i>
                                            </a>
                                            <a href="{{ route('admin.student.edit', $student->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
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

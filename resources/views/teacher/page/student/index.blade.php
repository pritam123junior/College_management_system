@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Student List</h4>
                    </div>
                    <a href="{{ route('admin.student.create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> Add Student</a>
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
                                    <tr class="{{$student->user->approve_status=='Pending'?'table-info':''}}">
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>  
                                        <td>{{ $student->user?->mobile}}</td>      
                                        <td>{{ $student->class?->name }}</td>
                                        <td>{{ $student->section?->name }}</td>                                      
                                        <td>{{$student->user->approve_status}}</td>
                                        <td>
                                        @if($student->user->approve_status=='Pending')
                                            <a href="{{ route('admin.student.status.approved', $student->user->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-person-check"></i> Approve
                                            </a>
                                             <a href="{{ route('admin.student.status.not_approved', $student->user->id) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-person-dash"></i> Reject
                                            </a>
                                        @else
                                        <a href="{{ route('admin.student.status.toggle', $student->user->id) }}"
                                                class="btn btn-primary btn-sm">
                                               <i class="bi bi-arrow-left-right"></i>
                                               
                                        </a>
                                        
                                            <a href="{{ route('admin.student.edit', $student->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>                                           
                                            <input type="hidden" class="row-id"
                                                value="{{ route('admin.student.destroy', $student->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        @endif
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

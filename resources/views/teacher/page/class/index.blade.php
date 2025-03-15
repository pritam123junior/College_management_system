@extends('teacher.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Class List</h4>
                    </div>
                    
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $index => $class)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $class->name }}</td>   
                                        <td>                                        
                                        @foreach ($class->sections as $index => $section)
                                            <span class="text-secondary">{{$index+1}}. {{$section->name}}</span>
                                            @if(!$loop->last)<br>@endif
                                        @endforeach                                        
                                        </td>                                 
                                        <td>
                                            <a href="{{ route('admin.class.edit', $class->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>                                            
                                            <input type="hidden" class="row-id"
                                                value="{{ route('admin.class.destroy', $class->id) }}">
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

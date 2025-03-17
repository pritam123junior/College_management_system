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
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($courses as $course)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ asset('images/dashboard/top-header.png') }}" class="card-img-top"
                                        alt="" style="height:10rem;">
                                    <div class="card-body" style="background-color:lavender">
                                        <h5 class="card-title">{{ $course->name }}</h5>
                                        <span class="card-text">Class:{{ $course->class->name }}</span><br>
                                        <span
                                            class="card-text">Price:{{ $course->price > 0 ? $course->price . ' BDT' : 'N/A' }}</span><br>
                                        <span class="card-text">Type:{{ $course->type }}</span>

                                    </div>
                                    <div class="card-footer" style="background-color:#cbd3d3">
                                        <a href="{{ route('admin.course.edit', $course->id) }}"
                                            class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('admin.course.content.index', $course->id) }}"
                                            class="btn btn-secondary btn-sm"><i class="bi bi-folder"></i></a>
                                        <a href="{{ route('admin.course.group.list', $course->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-collection"></i></a>
                                        <input type="hidden" class="row-id"
                                            value="{{ route('admin.course.destroy', $course->id) }}">
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

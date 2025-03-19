@extends('teacher.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">exam List</h4>
                    </div>
                    <a href="{{ route('teacher.exam.create') }}" class="btn btn-primary">Add exam</a>
                </div>
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($exams as $exam)
                            <div class="col">
                                    
                                <div class="card">
                                    <img src="{{ asset('images/dashboard/top-header.png') }}" class="card-img-top"
                                        alt="" style="height:10rem;">
                                    <div class="card-body" style="background-color:lavender">
                                        <h5 class="card-title">{{ $exam->title }}</h5>
                                        <span class="card-text">Class: {{ $exam->class->name }}</span><br>
                                        <span class="card-text">Version: {{ $exam->version }}</span><br>
                                        
                                           <span class="card-text">Type: {{ $exam->type }} </span><br>
                                           <span class="card-text">Duration: {{ $exam->duration }}</span>
                                    </div>
                                    
                                    <div class="card-footer" style="background-color:#cbd3d3">
                                        <a href="{{ route('teacher.question.index', $exam->id) }}"
                                            class="btn btn-warning btn-sm"> <i class="bi bi-building-fill-add"></i></a>
                                        <a href="{{ route('teacher.exam.edit', $exam->id) }}"
                                            class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                                           
                                        <input type="hidden" class="row-id"
                                            value="{{ route('teacher.exam.destroy', $exam->id) }}">
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

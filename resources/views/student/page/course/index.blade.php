@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Course List</h4>
                    </div>
                  
                </div>
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($courses as $course)
                            <div class="col">
                                <div class="card" onclick="window.location.href='{{ route('content.index', $course->id) }}'" style="cursor: pointer;">
                                    <img src="{{ asset('images/dashboard/top-header.png') }}" class="card-img-top"
                                        alt="" style="height:10rem;">
                                    <div class="card-body" style="background-color:lavender">
                                        <h5 class="card-title">{{ $course->name }}</h5>
                                        <span class="card-text">Class: {{ $course->class->name }}</span><br>
                                        <span class="card-text">Type: {{ $course->type }}</span><br>
                                        @if($course->type==='Paid')
                                            <span class="card-text">Price: {{ $course->price . ' BDT' }}</span>
                                        @endif

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

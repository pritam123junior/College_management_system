@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Basic Form</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $course->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{  $course->description }}</textarea>
                        </div>
                            <div class="form-group">
                           <label for="class_id" class="form-label">Class <span class="text-danger">*</span></label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price" class="form-label">Price (BDT)</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $course->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="form-label">Duration (e.g., 2 hours)</label>
                            <input type="text" class="form-control" id="duration" name="duration"
                                value="{{  $course->duration }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Course Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value ="">Select Type</option>

                                <option value="paid" {{ $course->type == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="free" {{ $course->type == 'free' ? 'selected' : '' }}>Free</option>
                            </select>
                        </div>
                        <div class="checkbox mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('teacher.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Exam</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.exam.update', $exam->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $exam->title }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control" required>
                                <option value="practice" {{ isset($exam) && $exam->type == 'practice' ? 'selected' : '' }}>
                                    Practice</option>
                                <option value="live" {{ isset($exam) && $exam->type == 'live' ? 'selected' : '' }}>Live
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Language</label>
                            <select name="version" class="form-control" required>
                                <option value="english" {{ isset($exam) && $exam->version == 'english' ? 'selected' : '' }}>
                                    English</option>
                                <option value="bangla" {{ isset($exam) && $exam->version == 'bangla' ? 'selected' : '' }}>
                                    Bangla</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="course_id" class="form-control" required>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ isset($exam) && $exam->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group priceshow d-none">
                            <label class="form-label">Duration (minutes)</label>
                            <input type="number" name="duration" class="form-control" value="{{ $exam->duration ?? '' }}"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

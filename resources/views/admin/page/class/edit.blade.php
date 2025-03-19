@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Class Edit</h4>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.class.update', ['id' => $class->id]) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Class Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $class->name }}" required>
                        </div>
                        <div id="dynamic-input-text">
                            @foreach ($sections as $section)
                                @if ($loop->last)
                                    <div class="form-group">
                                        <label class="form-label">Section</label>                                        
                                        <input type="text" class="form-control" name="sections[]"
                                            value="{{ $section->name }}">
                                        <button type="button" class="add-input-text-btn mt-2 btn btn-sm btn-secondary"><i
                                                class="bi bi-plus-circle-fill"></i></button>
                                        <button type="button" class="remove-input-text-btn btn btn-danger btn-sm mt-2"><i
                                                class="bi bi-dash-circle-fill"></i></button>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label class="form-label">Section</label>
                                        <input type="hidden" class="form-control" name="section_ids[]"
                                            value="{{ $section->id }}">
                                        <input type="text" class="form-control" name="sections[]"
                                            value="{{ $section->name }}">
                                        <button type="button" class="remove-input-text-btn btn btn-danger btn-sm mt-2"><i
                                                class="bi bi-dash-circle-fill"></i></button>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

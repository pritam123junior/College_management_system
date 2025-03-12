@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Class</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.class.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Class Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sections (Multiple Allowed)</label>
                            <select class="form-select" name="sections[]" multiple>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

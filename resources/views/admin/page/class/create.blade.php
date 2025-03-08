@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Add New Class</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.classes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sections (Multiple Allowed)</label>
            <select class="form-select" name="sections[]" multiple>
                <option value="A">Section A</option>
                <option value="B">Section B</option>
                <option value="C">Section C</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Class</button>
    </form>
</div>
@endsection

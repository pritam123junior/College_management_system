@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <h3>Class List</h3>
        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary">Add New Class</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Sections</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $index => $class)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td><span class="badge bg-{{ $class->status == 'active' ? 'success' : 'danger' }}">{{ ucfirst($class->status) }}</span></td>
                    <td>
                        @foreach($class->sections as $section)
                            <span class="badge bg-info">{{ $section->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this class?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $classes->links() }}
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Teacher</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Teacher ID</label>
                            <input type="text" name="user_teacher_id" class="form-control" value="{{$teacher->user?->user_teacher_id}}" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$teacher->name}}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$teacher->user->email}}" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{$teacher->user->mobile}}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

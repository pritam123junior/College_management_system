@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Teacher</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.teacher.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Teacher ID</label>
                            <input type="text" name="teacher_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>                       
                        <button type="submit" class="btn btn-primary">Add</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

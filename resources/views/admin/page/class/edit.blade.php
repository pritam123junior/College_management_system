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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p>
                   <form action="{{ route('admin.class.update', ['id'=>$class->id]) }}" method="POST">
        @csrf @method('PUT')
                        <div class="form-group">
                    <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="name" value="{{ $class->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
            <select class="form-select" name="status">
                <option value="active" {{ $class->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $class->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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

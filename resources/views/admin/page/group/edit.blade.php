@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit group</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course.group.update', $group->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$group->name}}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

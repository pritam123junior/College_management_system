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
                    
                   <form action="{{ route('admin.class.update', ['id'=>$class->id]) }}" method="POST">
        @csrf @method('PUT')
                        <div class="form-group">
                    <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="name" value="{{ $class->name }}" required>
                        </div>
                       
                      
                        <button type="submit" class="btn btn-primary">Update</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

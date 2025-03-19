@extends('teacher.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add group</h4>
                    </div>
                </div>


                <div class="card-body">
                    <form action="{{ route('teacher.course.group.store',$id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                                      
                        <button type="submit" class="btn btn-primary">Add</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

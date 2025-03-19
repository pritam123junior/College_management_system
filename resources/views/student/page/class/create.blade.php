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
                        <div id="dynamic-input-text">
                            <div class="form-group">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" name="section[]">
                                <button type="button" class="add-input-text-btn mt-2 btn btn-secondary"><i class="bi bi-plus-circle-fill"></i> Add more section</button>
                            </div>  
                            
                        </div>                    
                        <button type="submit" class="btn btn-primary">Add</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
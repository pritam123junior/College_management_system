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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis,
                        diam nibh finibus leo</p>
                      <form action="{{ route('admin.student.update', $student->id) }}" method="POST" id="editStudentForm">
                @csrf
                @method('PUT')
              
                        <div class="form-group">
 <label class="form-label">Student Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                        </div>
                        <div class="form-group">
                          <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                        </div>
                        
                        <div class="form-group">
                         <label class="form-label">Class <span class="text-danger">*</span></label>
                        <select name="data_class_id" class="form-select" required>
                            <option value="">-- Select Class --</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $student->data_class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                         <div class="form-group">
                       <label class="form-label">Section</label>
                        <input type="text" name="section" class="form-control" value="{{ $student->section }}">
                        </div>
                                <div class="form-group">
                       <label class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="{{ $student->mobile }}">
                        </div>
                                       <div class="form-group">
                        <label class="form-label">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control">
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

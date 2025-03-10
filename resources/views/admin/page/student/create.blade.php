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
                     <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Student Name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                                 <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                        </div>
                        <div class="form-group">
                           <label for="class_id" class="form-label">Select Class</label>
                    <select name="data_class_id" id="data_class_id" class="form-control " required>
                        <option value="">-- Select Class --</option>
                        @foreach ($dataclasses as $dataclass)
                            <option value="{{ $dataclass->id}}">{{ $dataclass->name }}</option>
                       
                        @endforeach
                    </select>
                        </div>
                          <div class="form-group">
                          <label for="section" class="form-label">Section (Optional)</label>
                    <input type="text" name="section" id="section" class="form-control" placeholder="Enter Section" value="{{ old('section') }}">
                        </div>  <div class="form-group">
                             <label for="mobile" class="form-label">Mobile Number (Optional)</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ old('mobile') }}">
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

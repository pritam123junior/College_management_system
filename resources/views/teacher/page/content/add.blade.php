@extends('teacher.layouts.app')
@section('content')
    <div class="row">
       <div class="col-sm-12 col-lg-12">
         <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Upload Content</h4>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route(teacher.content.store) }}">
                   @csrf
                        <div class="form-group">
                            <label class="form-label" for="file">Select File:</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>                   
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
       </div>
   </div>
@endsection

@extends('student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Content List</h4>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type Filter</label>
                        <select name="type" id="type" class="form-control" required>                            
                            <option value="Youtube Content" selected>Youtube Content</option>
                            <option value="File Content">File Content</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        @foreach ($contents as $content)
                            <div class="col-8">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/wzhJrXnh3ak?si=xq6UTVFd0q8xp-Ty" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="col-4">
                               menu
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

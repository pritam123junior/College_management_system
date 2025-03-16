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
                            <div class="col-6">
                                <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/wzhJrXnh3ak?si=xq6UTVFd0q8xp-Ty"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="col-6">
                                <div class="row"> 
                                @foreach ($groups as $group)                                   
                                    <div class="col-12">
                                        <div class="content-group bg-secondary p-2">
                                            <span>
                                            {{$group->name}}
                                            </span>
                                            <i class="bi bi-plus-square-fill" style="float:right;"></i>
                                        </div>
                                        <div class="content-item">
                                            <span>
                                            {{$group->name}}
                                            </span>
                                        </div>                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>                        
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

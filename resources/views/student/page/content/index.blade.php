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
                        <div class="col-12 col-lg-8">
                            <iframe class="content-youtube-iframe" width="100%" height="415"
                                src="" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="col-12 col-lg-4 bg-primary">

                            <div class="row">
                                <h6 class="text-center py-2">Play List</h6>
                                @foreach ($groups as $group)
                                    <div class="col-12">
                                        <div class="content-group p-2 mb-1 shadow rounded-1"
                                            style="background-color:#aebaf6">
                                            <span class="" style="color:darkslategray">
                                                {{ $group->name }}
                                            </span>
                                            <i class="bi bi-plus-square-fill content-item-show-action"
                                                style="float:right;color:darkgreen;cursor:pointer;"></i>
                                            <div class="content-item d-none py-2"
                                                style="display:flex;flex-direction:column;gap:5px;padding-left:5px;">
                                                @foreach ($group->contents as $content)
                                                    <input type="hidden" class="content-key"
                                                        value="{{ $content->key }}">
                                                    <a class="content-item-action" style="cursor:pointer;">
                                                        <i class="bi bi-play-circle-fill"></i> {{ $content->name }}</a>                                                    
                                                @endforeach
                                            </div>
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

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

                            <iframe class="content-youtube-iframe" width="100%" height="415" src=""
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        </div>
                        <div class="col-12 col-lg-4 bg-primary rounded">


                            <h6 class="text-center py-3 text-light">Play List</h6>


                            <div class="accordion pb-3" id="accordionExample">
                                @foreach ($groups as $group)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $group->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $group->id }}">
                                                {{ $group->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $group->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @foreach ($group->contents as $content)
                                                    <section class=""
                                                        style="display:flex;flex-direction:column;gap:5px;">
                                                        <input type="hidden" class="content-key"
                                                            value="{{ $content->key }}">
                                                        <a class="content-item-action"
                                                            style="cursor:pointer;padding-top:3px;padding-bottom:3px;">
                                                            <i class="bi bi-play-circle-fill"></i> {{ $content->name }}</a>

                                                        <section>
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

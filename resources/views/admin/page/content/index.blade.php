@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Course List</h4>
                    </div>
                    <a href="{{ route('admin.content.create') }}" class="btn btn-primary">Add Content</a>
                </div>
                <div class="card-body">

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($contents as $content)
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        File Content
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $content->name }}</h5>
                                        <p class="card-text">{{ $content->description }}</p>
                                         <p>Date:{{ $content->created_at }}</p>
                                        <a href="{{ route('admin.content.download', $content->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>                                        
                                    </div>
                                    <div class="card-footer text-muted">
                                        <input type="hidden" class="row-id"
                                            value="{{ route('admin.content.destroy', $content->id) }}">
                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

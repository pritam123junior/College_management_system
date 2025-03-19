@extends('teacher.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Questions</h4>
                    </div>
                    <a href="{{ route('teacher.question.create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> Add Question</a>
                </div>
                <div class="card-body p-0">
                 <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                               <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">ID</th>
                  
                    <th class="border border-gray-300 p-2">Question Text</th>
                    <th class="border border-gray-300 p-2">Options</th>
                    <th class="border border-gray-300 p-2">Correct Option</th>
                    <th class="border border-gray-300 p-2">Solution</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
                            </thead>
                     <tbody>
                @foreach($questions as $question)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $question->id }}</td>
                   
                    <td class="border border-gray-300 p-2">{!! $question->question_text !!}</td>
                    <td class="border border-gray-300 p-2">
                        <ul>
                            <li>{{ $question->option_1 }}</li>
                            <li>{{ $question->option_2 }}</li>
                            <li>{{ $question->option_3 }}</li>
                            <li>{{ $question->option_4 }}</li>
                        </ul>
                    </td>
                    <td class="border border-gray-300 p-2">{{ $question->correct_option }}</td>
                   <td class="border border-gray-300 p-2">{{ $question->solution}}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('teacher.question.edit', $question->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>                                           
                                            <input type="hidden" class="row-id"
                                                value="{{ route('teacher.question.destroy', $question->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        
                    </td>
                </tr>
                @endforeach
            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('teacher.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add question</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="form-label">Question Number</label>
                                <input type="number" min="1" name="name" id="name"
                                    class="question-number form-control" placeholder="Enter Question  Number">
                                <button type="button" class="add-question-btn btn btn-primary">Add</button>
                            </div>

                        </div>
                    </div>
                    <form class="question-form" action="{{ route('teacher.question.store') }}" method="POST">
                        @csrf
                        <div class="question-list">
                            <section class="single-question bg-light p-4">

                                <div class="form-group">
                                    <label for="name" class="form-label">Question 1</label>
                                    <input type="text" name="questions[0][question_text]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Option 1</label>
                                    <input type="text" name="questions[0][option_1]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Option 2</label>
                                    <input type="text" name="questions[0][option_2]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Option 3</label>
                                    <input type="text" name="questions[0][option_3]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Option 4</label>
                                    <input type="text" name="questions[0][option_4]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Correct Option </label>
                                    <select name="questions[0][correct_option]" class="form-control" required>
                                        <option value="option_1">Option 1</option>
                                        <option value="option_2">Option 2</option>
                                        <option value="option_3">Option 3</option>
                                        <option value="option_4">Option 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">mark e.g. 1</label>
                                    <input type="number" name="questions[0][marks]" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Solution</label>
                                    <input type="text" name="questions[0][solution]" class="form-control">
                                </div>
                            </section>
                        </div>
                        <button type="submit" class="btn btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

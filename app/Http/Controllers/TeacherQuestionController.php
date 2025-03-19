<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;


class TeacherQuestionController extends Controller
{
   
         public function index()
    {
        $questions = Question::get();
        return view('teacher.page.question.index', compact('questions'));
    }

    // Show form to create a new question
    public function create()
    {
        return view('teacher.page.question.create');
    }

    // Store a new question
    public function store(Request $request)
    {
       
  
        if ($request->questions) {
            foreach ($request->questions as $question) {
                Question::create(['user_id' => Auth::id(),
        'exam_id' => $question->exam_id,
        'question_text' => $question->question_text,
        'option_1' => $question->option_1,
        'option_2' => $question->option_2,
        'option_3' => $question->option_3,
        'option_4' => $question->option_4,
        'correct_option' => is_array($question->correct_option) ? implode(',', $request->correct_option) : $request->correct_option,
        'marks' => $question->marks,
        'solution' => $question->solution]);
            }
        }

        
        
       

        return redirect()->route('teacher.question.index')->with('success', 'Question added successfully.');
    }

    // Show form to edit a question
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('teacher.page.questions.edit', compact('question'));
    }

    // Update a question
    public function update(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_1' => 'required|string',
            'option_2' => 'required|string',
            'option_3' => 'required|string',
            'option_4' => 'required|string',
            'correct_option' => 'required|in:option_1,option_2,option_3,option_4',
            'marks' => 'required|integer|min:1',
            'solution' => 'nullable|string',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('teacher.exam.index')->with('success', 'Question updated successfully.');
    }

    // Delete a question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('teacher.exam.index')->with('success', 'Question deleted successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($course_id, Request $request)
    {

        if ($request->type == 'file') {
            $contents = Content::where('course_id', $course_id)->where('type', 'file')->where('class_id',Auth::user()->student?->class_id)->get();
            $selected_type = 'file';
        } elseif ($request->type == 'youtube') {
            $contents = Content::where('course_id', $course_id)->where('type', 'youtube')->get();
            $selected_type = 'youtube';
        } else {
            $contents = Content::where('course_id', $course_id)->where('type', 'youtube')->get();
            $selected_type = '';
        }

        return view('admin.page.content.index', compact('contents', 'course_id', 'selected_type'));

    }
}

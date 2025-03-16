<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use Auth;

class ContentController extends Controller
{
    public function index()
    {

        $contents = content::where('class_id',Auth::user()->student?->class_id)->paginate(12);

        return view('student.page.content.index', compact( 'contents'));
    }   
}

<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($id)
{


   $content = content::where('course_id',$id)->get();
   return view('student.page.content.index', compact( 'content'));
}   
}

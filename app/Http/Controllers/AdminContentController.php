<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class AdminContentController extends Controller
{
    public function index()
    {
        $contents = Content::get(); 
        return view('admin.page.student.index', compact('contents'));
    }
}

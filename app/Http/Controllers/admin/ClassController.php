<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataClass;

class ClassController extends Controller
{
    public function index()
    {
      return  $dataclasses = DataClass::all();
        return view('admin.page.class.index', compact('dataclasses'));
    
    }
    
}

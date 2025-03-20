<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class AdminSystemController extends Controller
{
    public function clear(){

        Artisan::call('route:cache');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForeCast extends Controller
{
    public function index(){
        return view('mainindex.forecast');
    }
}

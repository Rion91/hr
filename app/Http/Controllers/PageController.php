<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        $employee = auth()->user();
        return view('dashboard', compact('employee'));
    }
}

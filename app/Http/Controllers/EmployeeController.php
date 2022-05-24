<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function serverSide(Request $request)
    {
        $employee = User::query();
        return DataTables::of($employee)->make(true);
    }
}

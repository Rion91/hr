<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = User::with('department');
            return DataTables::of($employees)
                ->addColumn('department_name', function ($employee){
                    return $employee->department ? $employee->department->title : '-';
                })
                ->editColumn('is_present', function($employee){
                    if ($employee->is_present == 1){
                        return '<span class="badge badge-pill badge-light border border-success">Present</span>';
                    }else{
                        return '<span class="badge badge-pill badge-light border border-warning">Leave</span>';
                    }
                })
                ->rawColumns(['is_present'])
                ->make(true);
        }
        return view('employee.index');
    }

}

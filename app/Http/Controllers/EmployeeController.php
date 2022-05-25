<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = User::with('department');
            return DataTables::of($employees)
                ->addColumn('department_name', function ($employee) {
                    return $employee->department ? $employee->department->title : '-';
                })
                ->editColumn('is_present', function ($employee) {
                    if ($employee->is_present == 1) {
                        return '<span class="badge badge-pill badge-light border border-success">Present</span>';
                    } else {
                        return '<span class="badge badge-pill badge-light border border-warning">Leave</span>';
                    }
                })
                ->rawColumns(['is_present'])
                ->make(true);
        }
        return view('employee.index');
    }

    //create employee
    public function create()
    {
        $departments = Department::orderBy('title')->get();
        return view('employee.create', compact('departments'));
    }

    public function store(StoreEmployee $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('employee.index')->with('create', 'Employee info successfully created.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
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
                ->editColumn('updated_up', function ($employee){
                    return Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($employee){
                    $editIcon = '<a href="'. route('employee.edit', $employee->id) .'" class="text-warning" style="font-size: 20px"><i class="fas fa-edit"></i></a>';
                    $showIcon = '<a href="'. route('employee.show', $employee->id) .'" class="text-info" style="font-size: 20px"><i class="fas fa-info-circle"></i></a>';

                    return '<div class="action_icon">'.$editIcon.$showIcon.'</div>';
                })
                ->addColumn('plusIcon', function ($employee){
                    return null;
                })
                ->rawColumns(['is_present', 'action'])
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

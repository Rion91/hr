<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('ViewDepartments')) {
            abort(403, 'Unauthorized action');
        }
        if ($request->ajax()) {
            $departments = Department::query();
            return DataTables::of($departments)
                ->editColumn('updated_at', function ($department) {
                    return Carbon::parse($department->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($department) {
                    $editIcon = '';
                    $deleteIcon = '';

                    if (auth()->user()->can('EditDepartments')) {
                        $editIcon = '<a href="' . route('department.edit', $department->id) . '" class="text-warning" ><i class="fas fa-edit"></i></a>';
                    }
                    if (auth()->user()->can('DeleteDepartments')) {
                        $deleteIcon = '<a href="#" class="text-danger delete-btn" data-id="' . $department->id . '" ><i class="fas fa-trash-alt"></i></a>';
                    }
                    return '<div class="action_icon">' . $editIcon . $deleteIcon . '</div>';
                })
                ->addColumn('plusIcon', function ($department) {
                    return null;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('department.index');
    }

    //create employee and store
    public function create()
    {
        if (!auth()->user()->can('CreateDepartments')) {
            abort(403, 'Unauthorized action');
        }
        return view('department.create');
    }

    public function store(StoreDepartment $request)
    {
        if (!auth()->user()->can('CreateDepartments')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();

        Department::create($data);

        return redirect()->route('department.index')->with('create', 'Department is successfully created.');
    }

    //edit and update
    public function edit(Department $department)
    {
        if (!auth()->user()->can('EditDepartments')) {
            abort(403, 'Unauthorized action');
        }
        return view('department.edit', compact('department'));
    }

    public function update(UpdateDepartment $request, Department $department)
    {
        if (!auth()->user()->can('EditDepartments')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();
        $department->update($data);
        return redirect()->route('department.index')->with('updated', "Department is successfully updated.");
    }

    //delete
    public function destroy(Department $department)
    {
        if (!auth()->user()->can('Deleteepartments')) {
            abort(403, 'Unauthorized action');
        }
        $department->delete();
        return 'success';
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('ViewEmployees')) {
            abort(403, 'Unauthorized action');
        }
        if ($request->ajax()) {
            $employees = User::with('department');
            return DataTables::of($employees)
                ->filterColumn('department_name', function ($query, $key) {
                    $query->whereHas('department', function ($query) use ($key) {
                        $query->where('title', 'LIKE', '%' . $key . '%');
                    });
                })
                ->addColumn('role_name', function ($employee) {
                    $output = '';
                    foreach ($employee->roles as $role) {
                        $output .= '<span class="badge badge-pill badge-primary m-1">' . $role->name . '</span>';
                    }
                    return $output;
                })
                ->addColumn('department_name', function ($employee) {
                    return $employee->department ? $employee->department->title : '-';
                })
                ->editColumn('profile_img', function ($employee) {
                    return '<img src="' . $employee->profileImgPath() . '" class="profile-thumbnail"><p class="my-1">' . $employee->name . '</p>';
                })
                ->editColumn('is_present', function ($employee) {
                    if ($employee->is_present == 1) {
                        return '<span class="badge badge-pill badge-light border border-success">Present</span>';
                    } else {
                        return '<span class="badge badge-pill badge-light border border-warning">Leave</span>';
                    }
                })
                ->editColumn('updated_up', function ($employee) {
                    return Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($employee) {
                    $editIcon = '';
                    $showIcon = '';
                    $deleteIcon = '';

                    if (auth()->user()->can('ViewEmployees')) {
                        $showIcon = '<a href="' . route('employee.show', $employee->id) . '" class="text-info" ><i class="fas fa-info-circle"></i></a>';
                    }
                    if (auth()->user()->can('EditEmployees')) {
                        $editIcon = '<a href="' . route('employee.edit', $employee->id) . '" class="text-warning" ><i class="fas fa-edit"></i></a>';
                    }
                    if (auth()->user()->can('DeleteEmployees')) {
                        $deleteIcon = '<a href="#" class="text-danger delete-btn" data-id="' . $employee->id . '" ><i class="fas fa-trash-alt"></i></a>';
                    }

                    return '<div class="action_icon">' . $editIcon . $showIcon . $deleteIcon . '</div>';
                })
                ->addColumn('plusIcon', function ($employee) {
                    return null;
                })
                ->rawColumns(['profile_img', 'is_present', 'action', 'role_name'])
                ->make(true);
        }
        return view('employee.index');
    }

    //create employee and store
    public function create()
    {
        if (!auth()->user()->can('CreateEmployees')) {
            abort(403, 'Unauthorized action');
        }
        $departments = Department::orderBy('title')->get();
        $roles = Role::all();
        return view('employee.create', compact('departments', 'roles'));
    }

    public function store(StoreEmployee $request)
    {
        if (!auth()->user()->can('Create Employees')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();

        $data['profile_img'] = $request->file('profile_img')->store('employee');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->syncRoles($request->roles);

        return redirect()->route('employee.index')->with('create', 'Employee info successfully created.');
    }

    //edit and update
    public function edit(User $employee)
    {
        if (!auth()->user()->can('EditEmployees')) {
            abort(403, 'Unauthorized action');
        }
        $oldRoles = $employee->roles->pluck('id')->toArray();
        $departments = Department::orderBy('title')->get();
        $roles = Role::all();
        return view('employee.edit', compact('employee', 'oldRoles', 'departments', 'roles'));
    }

    public function update(UpdateEmployee $request, User $employee)
    {
        if (!auth()->user()->can('EditEmployees')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();
        if (request()->hasFile('profile_img')) {
            Storage::delete('storage/' . $employee->profile_img);
            $data['profile_img'] = $request->file('profile_img')->store('employee');
        }
        $data['password'] = $request->password ? Hash::make($request->password) : $employee->password;

        $employee->update($data);
        $employee->syncRoles($request->roles);

        return redirect()->route('employee.index')->with('updated', "Employee info successfully updated.");
    }

    //show
    public function show(User $employee)
    {
        if (!auth()->user()->can('ViewEmployees')) {
            abort(403, 'Unauthorized action');
        }
        return view('employee.show', compact('employee'));
    }

    //delete
    public function destroy(User $employee)
    {
        if (!auth()->user()->can('DeleteEmployees')) {
            abort(403, 'Unauthorized action');
        }
        $employee->delete();
        return 'success';
    }
}

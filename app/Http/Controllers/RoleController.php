<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;


class RoleController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('ViewRoles')) {
            abort(403, 'Unauthorized action');
        }
        if ($request->ajax()) {
            $roles = Role::query();
            return DataTables::of($roles)
                ->editColumn('updated_at', function ($role) {
                    return Carbon::parse($role->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('permission', function ($role) {
                    $output = '';
                    foreach ($role->permissions as $permission) {
                        $output .= '<span class="badge badge-pill badge-primary m-1">' . $permission->name . '</span>';
                    }
                    return $output;
                })
                ->addColumn('action', function ($role) {
                    $editIcon = '';
                    $deleteIcon = '';

                    if (auth()->user()->can('EditRoles')) {
                        $editIcon = '<a href="' . route('role.edit', $role->id) . '" class="text-warning" ><i class="fas fa-edit"></i></a>';
                    }
                    if (auth()->user()->can('DeleteRoles')) {
                        $deleteIcon = '<a href="#" class="text-danger delete-btn" data-id="' . $role->id . '" ><i class="fas fa-trash-alt"></i></a>';
                    }
                    return '<div class="action_icon">' . $editIcon . $deleteIcon . '</div>';
                })
                ->addColumn('plusIcon', function ($role) {
                    return null;
                })
                ->rawColumns(['action', 'permission'])
                ->make(true);
        }
        return view('role.index');
    }

    //create employee and store
    public function create()
    {
        if (!auth()->user()->can('CreateRoles')) {
            abort(403, 'Unauthorized action');
        }
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    public function store(StoreRole $request)
    {
        if (!auth()->user()->can('CreateRoles')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();

        $role = Role::create($data);
        $role->givePermissionTo($request->permissions);
        return redirect()->route('role.index')->with('create', 'Role is successfully created.');
    }

    //edit and update
    public function edit(Role $role)
    {
        if (!auth()->user()->can('EditRoles')) {
            abort(403, 'Unauthorized action');
        }
        $permissions = Permission::all();
        $oldPermissions = $role->permissions->pluck('id')->toArray();
        return view('role.edit', compact('role', 'oldPermissions', 'permissions'));
    }

    public function update(UpdateRole $request, Role $role)
    {
        if (!auth()->user()->can('EditRoles')) {
            abort(403, 'Unauthorized action');
        }
        $oldPermissions = $role->permissions->pluck('name')->toArray();
        $role->revokePermissionTo($oldPermissions);

        $data = $request->validated();
        $role->givePermissionTo($request->permissions);
        $role->update($data);
        return redirect()->route('role.index')->with('updated', "Role is successfully updated.");
    }

    //delete
    public function destroy(Role $role)
    {
        if (!auth()->user()->can('DeleteRoles')) {
            abort(403, 'Unauthorized action');
        }
        $role->delete();
        return 'success';
    }
}


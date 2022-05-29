<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('ViewPermissions')) {
            abort(403, 'Unauthorized action');
        }
        if ($request->ajax()) {
            $permissions = Permission::query();
            return DataTables::of($permissions)
                ->editColumn('updated_at', function ($permission) {
                    return Carbon::parse($permission->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($permission) {
                    $editIcon = '';
                    $deleteIcon = '';

                    if (auth()->user()->can('EditPermissions')){
                        $editIcon = '<a href="' . route('permission.edit', $permission->id) . '" class="text-warning" ><i class="fas fa-edit"></i></a>';
                    }
                    if (auth()->user()->can('DeletePermissions')){
                        $deleteIcon = '<a href="#" class="text-danger delete-btn" data-id="' . $permission->id . '" ><i class="fas fa-trash-alt"></i></a>';
                    }

                    return '<div class="action_icon">' . $editIcon . $deleteIcon . '</div>';
                })
                ->addColumn('plusIcon', function ($permission) {
                    return null;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('permission.index');
    }

    //create employee and store
    public function create()
    {
        if (!auth()->user()->can('CreatePermissions')) {
            abort(403, 'Unauthorized action');
        }
        return view('permission.create');
    }

    public function store(StorePermission $request)
    {
        if (!auth()->user()->can('CreatePermissions')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();

        Permission::create($data);

        return redirect()->route('permission.index')->with('create', 'Permission is successfully created.');
    }

    //edit and update
    public function edit(Permission $permission)
    {
        if(!auth()->user()->can('EditPermissions')) {
            abort(403, 'Unauthorized action');
        }
        return view('permission.edit', compact('permission'));
    }

    public function update(UpdatePermission $request, Permission $permission)
    {
        if (!auth()->user()->can('EditPermissions')) {
            abort(403, 'Unauthorized action');
        }

        $data = $request->validated();
        $permission->update($data);
        return redirect()->route('permission.index')->with('updated', "Permission is successfully updated.");
    }

    //delete
    public function destroy(Permission $permission)
    {
        if(!auth()->user()->can('DeletePermissions')) {
            abort(403, 'Unauthorized action');
        }
        $permission->delete();
        return 'success';
    }
}

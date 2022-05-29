<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'ViewProfile',
                'guard_name' => 'web',
            ],
            [
                'name' => 'EditProfile',
                'guard_name' => 'web',
            ],
            [
                'name' => 'ViewEmployees',
                'guard_name' => 'web',
            ],
            [
                'name' => 'CreateEmployees',
                'guard_name' => 'web',
            ],
            [
                'name' => 'EditEmployees',
                'guard_name' => 'web',
            ],
            [
                'name' => 'DeleteEmployees',
                'guard_name' => 'web',
            ],
            [
                'name' => 'ViewRoles',
                'guard_name' => 'web',
            ],
            [
                'name' => 'CreateRoles',
                'guard_name' => 'web',
            ],
            [
                'name' => 'EditRoles',
                'guard_name' => 'web',
            ],
            [
                'name' => 'DeleteRoles',
                'guard_name' => 'web',
            ],
            [
                'name' => 'ViewPermissions',
                'guard_name' => 'web',
            ],
            [
                'name' => 'CreatePermissions',
                'guard_name' => 'web',
            ],
            [
                'name' => 'EditPermissions',
                'guard_name' => 'web',
            ],
            [
                'name' => 'DeletePermissions',
                'guard_name' => 'web',
            ],
            [
                'name' => 'ViewDepartments',
                'guard_name' => 'web',
            ],
            [
                'name' => 'CreateDepartments',
                'guard_name' => 'web',
            ],
            [
                'name' => 'EditDepartments',
                'guard_name' => 'web',
            ],
            [
                'name' => 'DeleteDepartments',
                'guard_name' => 'web',
            ],
        ];
        DB::table('permissions')->insert($permissions);
    }
}

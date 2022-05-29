<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'employee_id' => 'Admin001',
                'name' => 'SuperAdmin',
                'email' => 'admin@gmail.com',
                'phone' => '09123456789',
                'nrc_number' => '167540',
                'birthday' => '2000-11-09',
                'department_id' => 1,
                'gender' => 'male',
                'date_of_join' => '2022-05-1',
                'is_present' => 1,
                'address' => 'Hlaing Township, Yangon',
                'password' => Hash::make('password'),
            ],
            [
                'employee_id' => 'Marketing01',
                'name' => 'Marketing',
                'email' => 'marketing@gmail.com',
                'phone' => '09123456780',
                'nrc_number' => '167541',
                'birthday' => '2000-11-10',
                'department_id' => 1,
                'gender' => 'female',
                'date_of_join' => '2022-05-2',
                'is_present' => 1,
                'address' => 'Hlaing Township, Yangon',
                'password' => Hash::make('password'),
            ],
            [
                'employee_id' => 'SeniorWebDeveloper01',
                'name' => 'SeniorWebDeveloper',
                'email' => 'seniorwebdeveloper@gmail.com',
                'phone' => '09123456782',
                'nrc_number' => '167542',
                'birthday' => '2000-11-11',
                'department_id' => 1,
                'gender' => 'male',
                'date_of_join' => '2022-05-3',
                'is_present' => 1,
                'address' => 'Hlaing Township, Yangon',
                'password' => Hash::make('password'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}

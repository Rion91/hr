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
        DB::table('users')->insert([
            'employee_id' => 'Admin001',
            'name' => 'SuperAdmin',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'nrc_number' => '167540',
            'birthday' => '2000-11-09',
            'department_id' => 1,
            'gender' => 'male',
            'date_of_join' => '2022-05-26',
            'is_present' => 1,
            'address'=> 'Hlaing Township, Yangon',
            'password' => Hash::make('password'),
        ]);
    }
}

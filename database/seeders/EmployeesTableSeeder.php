<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'name' => 'Owner User',
            'email' => 'owner@example.com',
            'password' => Hash::make('password'),
            'employee_role' => 'owner',
        ]);

        Employee::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
            'employee_role' => 'employee',
        ]);

        // เพิ่มข้อมูลตัวอย่างอื่นๆ
        for ($i = 1; $i <= 3; $i++) {
            Employee::create([
                'name' => "Employee $i",
                'email' => "employee$i@example.com",
                'password' => Hash::make('password'),
                'employee_role' => 'employee',
            ]);
        }
    }
}

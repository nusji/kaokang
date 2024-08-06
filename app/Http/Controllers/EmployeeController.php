<?php
// app/Http/Controllers/EmployeeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required',
            'employee_role' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'username' => 'required|unique:employees',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'employee_role' => $request->employee_role,
            'address' => $request->address,
            'tel' => $request->tel,
            'username' => $request->username,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'employee_role' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'username' => 'required|unique:employees,username,' . $employee->id,
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'employee_role' => $request->employee_role,
            'address' => $request->address,
            'tel' => $request->tel,
            'username' => $request->username,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}

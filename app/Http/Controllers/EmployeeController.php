<?php
// app/Http/Controllers/EmployeeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // แสดงรายชื่อพนักงานทั้งหมด
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // แสดงฟอร์มสำหรับเพิ่มพนักงานใหม่
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required|min:8',
            'employee_role' => 'required',
            'username' => 'required|unique:employees',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'employee_role' => $request->employee_role,
            'username' => $request->username,
            'is_profile_complete' => false, // ให้ค่าเริ่มต้น false
        ]);

        return redirect()->route('employees.create')->with('status', 'Employee created. Employee must complete their profile upon first login.');
    }


    public function completeProfile()
    {
        return view('employees.complete_profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'religion' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'work_experience' => 'nullable|string',
            'national_id' => 'required|string|max:20',
            'national_id_copy' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_tel' => 'nullable|string|max:15',
            'bank_account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
            'citizenship_number' => 'nullable|string|max:20',
            'important_person_address' => 'nullable|string|max:255',
            'work_permit' => 'nullable|string|max:255',
            'interests' => 'nullable|string',
            'social_security_number' => 'nullable|string|max:20',
        ]);

        $employee = auth()->user();

        if ($request->hasFile('national_id_copy')) {
            $filePath = $request->file('national_id_copy')->store('public/national_id_copies');
            $employee->national_id_copy = $filePath;
        }

        $employee->update($request->except('national_id_copy'));
        $employee->is_profile_complete = true; // ตั้งค่าสถานะเป็น true
        $employee->save();

        return redirect()->route('home')->with('status', 'Profile updated successfully.');
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


    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
}

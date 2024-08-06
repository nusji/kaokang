<!-- resources/views/employees/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
        </div>
        <div class="form-group">
            <label for="employee_role">Role</label>
            <select class="form-control" id="employee_role" name="employee_role" required>
                <option value="owner" {{ old('employee_role', $employee->employee_role) == 'owner' ? 'selected' : '' }}>Owner</option>
                <option value="employee" {{ old('employee_role', $employee->employee_role) == 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}" required>
        </div>
        <div class="form-group">
            <label for="tel">Telephone</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel', $employee->tel) }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $employee->username) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

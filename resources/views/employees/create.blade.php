<!-- resources/views/employees/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">ชื่อ-สกุล</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">อีเมลล์</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="employee_role">สิทธิ์/ตำแหน่ง</label>
            <select class="form-control" id="employee_role" name="employee_role" required>
                <option value="owner" {{ old('employee_role') == 'owner' ? 'selected' : '' }}>Owner</option>
                <option value="employee" {{ old('employee_role') == 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">ที่อยู่บ้าน</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>
        <div class="form-group">
            <label for="tel">เบอร์โทร</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <button type="submit" class="btn btn-success">บันทึกพนักงานใหม่</button>
    </form>
</div>
@endsection

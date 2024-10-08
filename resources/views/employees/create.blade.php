@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <h3>ข้อมูลพื้นฐานของพนักงาน</h3>
        <div class="form-group">
            <label for="name">ชื่อ-สกุล</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="form-group">
            <label for="email">อีเมลเข้าใช้งาน</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="employee_role">สิทธิ์/ตำแหน่ง</label>
            <select class="form-control" id="employee_role" name="employee_role" required>
                <option value="employee" selected>Employee</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">บันทึกข้อมูลพื้นฐาน</button>
    </form>
</div>
@endsection

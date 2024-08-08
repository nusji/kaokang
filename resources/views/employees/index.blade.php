<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-5">เพิ่มข้อมูลพนักงานใหม่</a>
    <div class="row">
        @foreach ($employees as $employee)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">ชื่อ : {{ $employee->name }}</h5>
                        <p class="card-text">อีเมลล์ : {{ $employee->email }}</p>
                        <p class="card-text">ประเภท : {{ $employee->employee_role }}</p>
                        <p class="card-text">เบอร์โทร : {{ $employee->tel }}</p>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">ดูข้อมูล</a>
                        @if ($employee->employee_role !== 'owner')
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">แก้ไข</a>
                        <form action="{{ route('employees.delete', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">ลบพนักงาน</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

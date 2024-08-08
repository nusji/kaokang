@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header text-center">
            <h1>ข้อมูลพนักงาน</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">ชื่อ - นามสกุล:</div>
                <div class="col-md-8">{{ $employee->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">เบอร์โทรติดต่อ:</div>
                <div class="col-md-8">{{ $employee->tel }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">ที่อยู่:</div>
                <div class="col-md-8">{{ $employee->address }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">อีเมลล์:</div>
                <div class="col-md-8">{{ $employee->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">รหัสผู้ใช้:</div>
                <div class="col-md-8">{{ $employee->username }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">รหัสผ่านเข้าใช้:</div>
                <div class="col-md-8">{{ $employee->password }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">สิทธิการเข้าถึง:</div>
                <div class="col-md-8">{{ $employee->employee_role }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-right font-weight-bold">รูปภาพ:</div>
                <div class="col-md-8">
                    <img src="{{ asset('storage/' . $employee->image_path) }}" alt="รูปภาพของ {{ $employee->name }}" class="img-fluid rounded">
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">กลับไปที่รายการพนักงาน</a>
            </div>
        </div>
    </div>
</div>
@endsection

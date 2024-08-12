@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card mt-5 shadow-lg">
                <div class="card-header text-center bg-secondary text-white">
                    <h2>ข้อมูลพนักงาน</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $employee->image_path) }}" 
                             alt="รูปภาพของ {{ $employee->name }}" 
                             class="img-fluid rounded-circle shadow-sm" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">ชื่อ - นามสกุล:</div>
                        <div class="col-md-8">{{ $employee->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">เบอร์โทรติดต่อ:</div>
                        <div class="col-md-8">{{ $employee->tel }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">ที่อยู่:</div>
                        <div class="col-md-8">{{ $employee->address }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">อีเมลล์:</div>
                        <div class="col-md-8">{{ $employee->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">รหัสผู้ใช้:</div>
                        <div class="col-md-8">{{ $employee->username }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">รหัสผ่านเข้าใช้:</div>
                        <div class="col-md-8"><em>********</em> <!-- คุณสามารถซ่อนหรือแทนที่รหัสผ่านได้ --></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">สิทธิการเข้าถึง:</div>
                        <div class="col-md-8">
                            <span class="badge badge-info">{{ $employee->employee_role }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">กลับไปที่รายการพนักงาน</a>
                    <button onclick="printEmployeeInfo()" class="btn btn-primary">พิมพ์ข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function printEmployeeInfo() {
    var printContents = document.querySelector('.card-body').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
@endsection

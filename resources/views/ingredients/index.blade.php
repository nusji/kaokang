@extends('layouts.app')
@section('title', 'จัดการวัตถุดิบ')
@section('content')
    <h2>จัดการวัตถุดิบ</h2>
    <div class="dashboard d-flex justify-content-between align-items-center">
        @if (Auth::user()->employee_role === 'owner')
            <div class="dashboard">
                <div class="dashboard-button">
                    <a href="{{ route('ingredients.type.type') }}">
                        <i class="fa-solid fa-list"></i>
                        <span>จัดการประเภท</span>
                    </a>
                </div>
                <div class="dashboard-button">
                    <a href="{{ route('ingredients.create') }}">
                        <i class="fa-solid fa-square-plus"></i>
                        <span>เพิ่มวัตถุดิบ</span>
                    </a>
                </div>
            </div>
        @endif
        <div>
            @php
                $lowStockIngredients = $ingredients->filter(function ($ingredient) {
                    return $ingredient->ingredient_quantity <= 5;
                });

                $lowStockCount = $lowStockIngredients->count();
                $showIngredients = $lowStockIngredients->take(5);
            @endphp

            @if ($lowStockCount > 10)
                <div class="alert alert-warning mb-0">
                    <strong>หลายวัตถุดิบเหลือน้อย:</strong>
                    <ul>
                        @foreach ($showIngredients as $lowStockIngredient)
                            <li>{{ $lowStockIngredient->ingredient_name }} เหลือ
                                {{ $lowStockIngredient->ingredient_quantity }}
                                {{ $lowStockIngredient->ingredient_unit }}</li>
                        @endforeach
                    </ul>
                    @if ($lowStockCount > 5)
                        <p>และอีก {{ $lowStockCount - 5 }} รายการที่เหลือน้อย</p>
                    @endif
                </div>
            @elseif ($lowStockIngredients->isNotEmpty())
                <div class="alert alert-warning mb-0">
                    <strong>แจ้งเตือนวัตถุดิบเหลือน้อยต่ำกว่า 5 หน่วย:</strong>
                    <ul>
                        @foreach ($lowStockIngredients as $lowStockIngredient)
                            <li>{{ $lowStockIngredient->ingredient_name }} เหลือ
                                {{ $lowStockIngredient->ingredient_quantity }}
                                {{ $lowStockIngredient->ingredient_unit }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        @if (count($ingredients) > 0)
            <table class="table table-bordered text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อวัตถุดิบ</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">หน่วยวัตถุดิบ</th>
                        <th scope="col">จำนวนคงเหลือ</th>
                        @if (Auth::user()->employee_role === 'owner')
                            <th colspan="3">จัดการ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $index => $ingredient)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ingredient->ingredient_name }}</td>
                            <td>{{ $ingredient->ingredient_detail }}</td>
                            <td>{{ $ingredient->ingredientType->ingredient_type_name }}</td>
                            <td>{{ $ingredient->ingredient_unit }}</td>
                            <td>{{ $ingredient->ingredient_quantity }}</td>
                            @if (Auth::user()->employee_role === 'owner')
                                <td>
                                    <button class="btn btn-outline-secondary"
                                        onclick="confirmChange({{ $ingredient->ingredient_id }}, '{{ $ingredient->ingredient_name }}')">ปรับปรุงสต็อค</button>
                                </td>
                                <td>
                                    <button class="btn btn-warning"
                                        onclick="confirmEdit({{ $ingredient->ingredient_id }}, '{{ $ingredient->ingredient_name }}')">แก้ไข</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete({{ $ingredient->ingredient_id }}, '{{ $ingredient->ingredient_name }}')">ลบ</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>ไม่มีวัตถุดิบ</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmChange(id, name) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: `คุณต้องการปรับปรุงสต็อควัตถุดิบ ${name} หรือไม่?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ปรับปรุง!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ url('ingredients/changeQuantity') }}/${id}`;
                }
            });
        }

        function confirmEdit(id, name) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: `คุณต้องการแก้ไขวัตถุดิบ ${name} หรือไม่?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, แก้ไขเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ url('ingredients/edit') }}/${id}`;
                }
            });
        }

        function confirmDelete(id, name) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: `คุณต้องการลบวัตถุดิบ ${name} นี้ใช่หรือไม่?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ url('/ingredients/delete') }}/${id}`;
                }
            });
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                title: 'ข้อผิดพลาด!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
        @endif
    </script>
@endsection

@extends('layouts.app')
@section('title', 'จัดการประเภทวัตถุดิบ')
@section('content')
    <h1>จัดการประเภทวัตถุดิบ</h1>
    @if (Auth::user()->employee_role === 'owner')
        <div class="dashboard">
            <div class="dashboard-button">
                <a href="{{ route('ingredients.type.create') }}">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>เพิ่มประเภท</span>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('ingredients') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>ย้อนกลับ</span>
                </a>
            </div>
        </div>
    @endif
    @if (count($IngredientType) > 0)
        <table class="table table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">ชื่อประเภทวัตถุดิบ</th>
                    <th scope="col">รายละเอียด</th>
                    <th colspan="3">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($IngredientType as $type)
                    <tr>
                        <td>{{ $type->ingredient_type_name }}</td>
                        <td>{{ $type->ingredient_type_detail }}</td>

                        <td>
                            <a href="#"
                                onclick="confirmEdit('{{ $type->ingredient_type_id }}', '{{ $type->ingredient_type_name }}')"
                                class="btn btn-warning">แก้ไข</a>
                        </td>
                        <td>
                            <button class="btn btn-danger"
                                onclick="confirmDelete({{ $type->ingredient_type_id }}, '{{ $type->ingredient_type_name }}')">ลบ</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>ไม่มีวัตถุดิบ</p>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif
    <script>
        function confirmEdit(id, name) {
            Swal.fire({
                title: 'คุณต้องการแก้ไข ' + name + ' ใช่ไหม?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ใช่, แก้ไขเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url('ingredients/type/edit') }}/' + id;
                }
            });
        }
    </script>
    <script>
        function confirmDelete(ingredient_type_id, ingredient_type_name) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: `คุณต้องการลบประเภทวัตถุดิบ ${ingredient_type_name} นี้ใช่หรือไม่?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `{{ url('/ingredients/type/delete') }}/${ingredient_type_id}`;
                }
            })
        }
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'สำเร็จ!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'ข้อผิดพลาด!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

@endsection

@extends('layouts.app')
@section('title', 'แก้ไขวัตถุดิบ')
@section('content')
    <h2 class="text text-center">แก้ไขประเภทวัตถุดิบ</h2>
    <form method="POST" action="{{ route('ingredients.type.update', $IngredientType->ingredient_type_id) }}">
        @csrf
        <div class="form-group">
            <label for="ingredient_type_name">ชื่อประเภทวัตถุดิบ</label>
            <input type="text" class="form-control" id="ingredient_type_name" name="ingredient_type_name"
                value="{{ $IngredientType->ingredient_type_name }}" readonly>
        </div>
        <!-- ตรวจสอบว่ามีข้อผิดพลาดหรือไม่-->
        @error('ingredient_type_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="ingredient_type_detail">รายละเอียดประเภทวัตถุดิบ</label>
            <textarea class="form-control" id="ingredient_type_detail" cols="30" rows="5" name="ingredient_type_detail">{{ $IngredientType->ingredient_type_detail }}</textarea>
        </div>
        @error('ingredient_type_detail')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
    </form>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'ข้อผิดพลาด',
                html: `
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
            });
        </script>
    @endif


@endsection

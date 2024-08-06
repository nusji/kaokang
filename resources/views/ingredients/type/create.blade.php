@extends('layouts.app')
@section('title', 'เพิ่มประเภทวัตถุดิบ')
@section('content')
    <h1>เพิ่มประเภทวัตถุดิบ</h1>

    <form action="{{ route('ingredients.type.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ingredient_type_name">ชื่อประเภทวัตถุดิบ</label>
            <input type="text" class="form-control @error('ingredient_type_name') is-invalid @enderror"
                id="ingredient_type_name" name="ingredient_type_name" value="{{ old('ingredient_type_name') }}" required>
            @error('ingredient_type_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="ingredient_type_detail">รายละเอียด</label>
            <textarea class="form-control @error('ingredient_type_detail') is-invalid @enderror" id="ingredient_type_detail"
                name="ingredient_type_detail" rows="3" required>{{ old('ingredient_type_detail') }}</textarea>
            @error('ingredient_type_detail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <a href="{{ route('ingredients.type.type') }}" class="btn btn-secondary">ย้อนกลับ</a>
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

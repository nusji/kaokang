@extends('layouts.app')

@section('title', 'แก้ไขวัตถุดิบ')

@section('content')
    <form action="{{ route('ingredients.update', $ingredient->ingredient_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="ingredient_name">ชื่อวัตถุดิบ</label>
            <input type="text" class="form-control" id="ingredient_name" name="ingredient_name"
                value="{{ old('ingredient_name', $ingredient->ingredient_name) }}" required>
        </div>
        @error('ingredient_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="ingredient_detail">รายละเอียด</label>
            <textarea class="form-control" id="ingredient_detail" name="ingredient_detail" required>{{ old('ingredient_detail', $ingredient->ingredient_detail) }}</textarea>
        </div>
        @error('ingredient_detail')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="ingredient_type_id">ประเภทวัตถุดิบ</label>
            <select class="form-control" id="ingredient_type_id" name="ingredient_type_id" required>
                <option value="">เลือกประเภทวัตถุดิบ</option>
                @foreach ($ingredientTypes as $type)
                    <option value="{{ $type->ingredient_type_id }}"
                        {{ $type->ingredient_type_id == old('ingredient_type_id', $ingredient->ingredient_type_id) ? 'selected' : '' }}>
                        {{ $type->ingredient_type_name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('ingredient_type_id')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="ingredient_unit">หน่วยวัตถุดิบ</label>
            <input type="text" class="form-control" id="ingredient_unit" name="ingredient_unit"
                value="{{ old('ingredient_unit', $ingredient->ingredient_unit) }}" required>
        </div>
        @error('ingredient_unit')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
    </form>

    <script>
        document.getElementById('ingredient_type_search').addEventListener('input', function() {
            const query = this.value;
            const url = `{{ route('ingredients.create') }}?search=${query}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('ingredient_type_id');
                    select.innerHTML = '<option value="">เลือกประเภทวัตถุดิบ</option>';
                    data.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type.ingredient_type_id;
                        option.textContent = type.ingredient_type_name;
                        select.appendChild(option);
                    });
                });
        });
    </script>
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

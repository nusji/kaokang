@extends('layouts.app')

@section('title', 'เพิ่มเมนู')

@section('content')
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_name">ชื่อเมนู</label>
            <input type="text" class="form-control" id="menu_name" name="menu_name" required>
        </div>
        <div class="form-group">
            <label for="menu_detail">รายละเอียด</label>
            <textarea class="form-control" id="menu_detail" name="menu_detail"></textarea>
        </div>
        <div class="form-group">
            <label for="menu_type_id">ประเภทเมนู</label>
            <select class="form-control" id="menu_type_id" name="menu_type_id" required>
                <!-- แสดงประเภทเมนูที่มีอยู่ในฐานข้อมูล -->
                @foreach ($menuTypes as $menuType)
                    <option value="{{ $menuType->menu_type_id }}">{{ $menuType->menu_type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="menu_price">ราคา</label>
            <input type="number" class="form-control" id="menu_price" name="menu_price" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึกเมนู</button>
    </form>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->employee_role === 'owner')
    <div class="dashboard">
    <div class="dashboard-button">
        <a href="{{ route('menus.type.create') }}">
            <i class="fa-solid fa-square-plus"></i>
            <span>เพิ่ม</span>
        </a>
    </div>
    </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuTypes as $type)
            <tr>
                <td>{{ $type->menu_type_id }}</td>
                <td>{{ $type->menu_type_name }}</td>
                <td>{{ $type->menu_type_detail }}</td>
                <td>
                    <a href="{{ route('menus.type.edit', $type->menu_type_id) }}" class="btn btn-warning">แก้ไข</a>
                </td>
                <td>
                    <a href="{{ route('menus.type.delete', $type->menu_type_id) }}" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

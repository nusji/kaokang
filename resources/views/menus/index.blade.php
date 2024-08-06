@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->employee_role === 'owner')
    <div class="dashboard">
    <div class="dashboard-button">
        <a href="{{ route('menus.type.type') }}">
            <i class="fa-solid fa-list"></i>
            <span>ประเภท</span>
        </a>
    </div>
    <div class="dashboard-button">
        <a href="{{ route('menus.create') }}">
            <i class="fa-solid fa-square-plus"></i>
            <span>เพิ่มเมนู</span>
        </a>
    </div>
    </div>
@endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->menu_id }}</td>
                <td>{{ $menu->menu_name }}</td>
                <td>{{ $menu->menuType->menu_type_name }}</td>
                <td>{{ $menu->menu_price }}</td>
                <td>
                    @if (Auth::user()->employee_role === 'owner')
                    <a href="{{ route('menus.create_recipe', $menu->menu_id) }}" class="btn btn-primary">เพิ่มสูตรอาหาร</a>
                    <a href="{{ route('menus.edit', $menu->menu_id) }}" class="btn btn-warning">Edit</a>
                    @endif
                    <a href="{{ route('menus.recipes', $menu->menu_id) }}" class="btn btn-info">View Recipes</a>

                    <!-- Delete Button with SweetAlert -->
                    @if (Auth::user()->employee_role === 'owner')
                    <form action="{{ route('menus.delete', $menu->menu_id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this menu?');">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

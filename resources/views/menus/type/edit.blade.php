@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menus.type.update', $menuType->menu_type_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="menu_type_name">Menu Type Name</label>
            <input type="text" name="menu_type_name" id="menu_type_name" class="form-control" value="{{ old('menu_type_name', $menuType->menu_type_name) }}" required>
        </div>
        <div class="form-group">
            <label for="menu_type_detail">Menu Type Detail</label>
            <input type="text" name="menu_type_detail" id="menu_type_detail" class="form-control" value="{{ old('menu_type_detail', $menuType->menu_type_detail) }}">
        </div>
        <button type="submit" class="btn btn-warning">Update Menu Type</button>
    </form>
</div>
@endsection

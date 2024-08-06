@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ isset($menu) ? route('menus.update', $menu->id) : route('menus.store') }}" method="POST">
        @csrf
        @if(isset($menu))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="menu_name">Menu Name</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ old('menu_name', $menu->menu_name ?? '') }}">
        </div>
        <div class="form-group">
            <label for="menu_type_id">Menu Type</label>
            <select name="menu_type_id" id="menu_type_id" class="form-control">
                @foreach($menuTypes as $type)
                    <option value="{{ $type->menu_type_id }}" {{ isset($menu) && $menu->menu_type_id == $type->menu_type_id ? 'selected' : '' }}>{{ $type->menu_type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="menu_price">Menu Price</label>
            <input type="text" name="menu_price" id="menu_price" class="form-control" value="{{ old('menu_price', $menu->menu_price ?? '') }}">
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <select name="ingredients[]" id="ingredients" class="form-control" multiple>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->ingredient_id }}" {{ isset($menu) && $menu->recipes->contains('ingredient_id', $ingredient->ingredient_id) ? 'selected' : '' }}>{{ $ingredient->ingredient_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($menu) ? 'Update' : 'Add' }} Menu</button>
    </form>
</div>
@endsection

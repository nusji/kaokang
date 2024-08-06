<!-- resources/views/menus/create_recipe.blade.php -->
@extends('layouts.app')

@section('title', 'เพิ่มสูตรอาหาร')

@section('content')
    <form action="{{ route('menus.store_recipe', $menu->menu_id) }}" method="POST">
        @csrf
        <div id="ingredients-container">
            <div class="ingredient-group">
                <div class="form-group">
                    <label for="ingredient_id_1">วัตถุดิบ</label>
                    <select class="form-control" id="ingredient_id_1" name="ingredients[0][id]" required>
                        @foreach ($ingredients as $ingredient)
                            <option value="{{ $ingredient->ingredient_id }}">{{ $ingredient->ingredient_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ingredient_quantity_1">จำนวน</label>
                    <input type="number" step="0.01" class="form-control" id="ingredient_quantity_1" name="ingredients[0][quantity]" required>
                </div>
                <button type="button" class="btn btn-danger remove-ingredient">ลบ</button>
            </div>
        </div>
        <button type="button" class="btn btn-success" id="add-ingredient">เพิ่มวัตถุดิบ</button>
        <button type="submit" class="btn btn-primary">บันทึกสูตรอาหาร</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let ingredientIndex = 1;

            document.getElementById('add-ingredient').addEventListener('click', function() {
                const container = document.getElementById('ingredients-container');
                const newIngredientGroup = document.createElement('div');
                newIngredientGroup.classList.add('ingredient-group');

                newIngredientGroup.innerHTML = `
                    <div class="form-group">
                        <label for="ingredient_id_${ingredientIndex}">วัตถุดิบ</label>
                        <select class="form-control" id="ingredient_id_${ingredientIndex}" name="ingredients[${ingredientIndex}][id]" required>
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->ingredient_id }}">{{ $ingredient->ingredient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ingredient_quantity_${ingredientIndex}">จำนวน</label>
                        <input type="number" step="0.01" class="form-control" id="ingredient_quantity_${ingredientIndex}" name="ingredients[${ingredientIndex}][quantity]" required>
                    </div>
                    <button type="button" class="btn btn-danger remove-ingredient">ลบ</button>
                `;

                container.appendChild(newIngredientGroup);
                ingredientIndex++;
            });

            document.getElementById('ingredients-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-ingredient')) {
                    event.target.parentElement.remove();
                }
            });
        });
    </script>
@endsection

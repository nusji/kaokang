@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Recipes for {{ $menu->menu_name }}</h1>

        <!-- Display recipes if any -->
        @if ($menu->menu_recipes->isNotEmpty())
            <ul class="list-group">
                @foreach ($menu->menu_recipes as $recipe)
                    <li class="list-group-item">
                        {{ $recipe->recipe_name }}
                        @if ($recipe->recipe_id)
                            <a href="{{ route('recipes.show', $recipe->recipe_id) }}" class="btn btn-info btn-sm float-end">View
                                Recipe</a>
                        @else
                            <span class="text-danger">Invalid Recipe ID</span>
                        @endif
                    </li>
                @endforeach

            </ul>
        @else
            <p>No recipes available for this menu.</p>
        @endif

        <!-- Optionally add a button to go back to the menu list -->
        <a href="{{ route('menus.index') }}" class="btn btn-secondary mt-3">Back to Menus</a>
    </div>
@endsection

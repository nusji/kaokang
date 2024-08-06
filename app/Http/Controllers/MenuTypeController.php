<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\MenuRecipe;
use App\Models\Ingredient;

class MenuTypeController extends Controller
{
    public function type()
    {
        $menuTypes = MenuType::all();
        return view('menus.type.type', compact('menuTypes'));
    }

    public function typeCreate()
    {
        return view('menus.type.create');
    }

    public function typeStore(Request $request)
    {
        $request->validate([
            'menu_type_name' => 'required|string|max:255',
            'menu_type_detail' => 'nullable|string|max:255',
        ]);

        MenuType::create($request->all());

        return redirect()->route('menus.type.type')
            ->with('success', 'Menu Type created successfully.');
    }

    public function typeEdit(MenuType $menuType)
    {
        return view('menus.type.edit', compact('menuType'));
    }

    public function typeUpdate(Request $request, MenuType $menuType)
    {
        $request->validate([
            'menu_type_name' => 'required|string|max:255',
            'menu_type_detail' => 'nullable|string|max:255',
        ]);

        $menuType->update($request->all());

        return redirect()->route('menus.type.type')
            ->with('success', 'Menu Type updated successfully.');
    }

    public function typeDelete(MenuType $menuType)
    {
        $menuType->delete();

        return redirect()->route('menus.type.type')
            ->with('success', 'Menu Type deleted successfully.');
    }

    public function showRecipes($menu_id)
    {
        $menu = Menu::where('menu_id', $menu_id)->with('recipes')->firstOrFail();
        return view('menus.recipes', compact('menu'));
    }
    public function show($recipe_id)
    {
        $recipe = MenuRecipe::findOrFail($recipe_id);
        return view('recipes.show', compact('recipe'));
    }
}

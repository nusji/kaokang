<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuType;
use App\Models\MenuRecipe;
use App\Models\Ingredient; // assuming you have this model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('menuType')->get(); // Eager load the menuType relationship
        return view('menus.index', compact('menus'));
    }

    public function show($menu_id)
{
    $menu = Menu::with('menuType')->findOrFail($menu_id);
    return view('menus.show', compact('menu'));
}
    public function create()
    {
        $menuTypes = MenuType::all();
        $ingredients = Ingredient::all();
        return view('menus.create', compact('menuTypes', 'ingredients'));
    }

    public function store(Request $request)
    {
        // Validate ข้อมูลที่ได้รับ
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_detail' => 'nullable|string',
            'menu_type_id' => 'required|exists:menus_type,menu_type_id',
            'menu_price' => 'required|numeric',
        ]);
        // สร้างเมนูใหม่
        $menu = Menu::create([
            'menu_name' => $request->input('menu_name'),
            'menu_detail' => $request->input('menu_detail'),
            'menu_type_id' => $request->input('menu_type_id'),
            'menu_price' => $request->input('menu_price'),
        ]);

        return redirect()->route('menus.index', $menu->menu_id)->with('success', 'เมนูถูกสร้างสำเร็จ');
    }

    public function createRecipe($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        $ingredients = Ingredient::all();
        return view('menus.create_recipes', compact('menu', 'ingredients'));
    }

    public function storeRecipe(Request $request, $menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
    
        // ตรวจสอบข้อมูลที่ส่งมา
        $validatedData = $request->validate([
            'ingredients.*.id' => 'required|exists:ingredients,ingredient_id',
            'ingredients.*.quantity' => 'required|numeric',
        ]);
    
        // ลบสูตรอาหารเก่าหรือเพิ่มสูตรใหม่
        foreach ($request->ingredients as $ingredient) {
            $menu->ingredients()->updateOrCreate(
                [
                    'menu_id' => $menu_id,
                    'ingredient_id' => $ingredient['id']
                ],
                [
                    'quantity' => $ingredient['quantity']
                ]
            );
        }
    
        return redirect()->route('menus.index')->with('success', 'สูตรอาหารถูกบันทึกเรียบร้อยแล้ว');
    }
    












    public function edit(Menu $menu)
    {
        $menuTypes = MenuType::all();
        $ingredients = Ingredient::all();
        return view('menus.edit', compact('menu', 'menuTypes', 'ingredients'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->only('menu_name', 'menu_detail', 'menu_type_id', 'menu_price'));

        $menu->recipes()->delete(); // Remove old recipes

        foreach ($request->ingredients as $ingredientId) {
            MenuRecipe::create([
                'menu_id' => $menu->id,
                'ingredient_id' => $ingredientId,
            ]);
        }

        return redirect()->route('menus.index');
    }

    function delete($menu_id)
    {
        //ด้านล่างคือฟังก์ชั่นเช็คว่ามีข้อมูลอะไรที่เราดึงมา
        // dd(DB::table('blogs')->where('id', $id)->get());

        //ด้านล่างคือฟังก์ชั่นลบข้อมูล
        //แบบใช้ Eloquent ORM
        menu::find($menu_id)->delete();

        //แบบใช้ query builder
        //DB::table('blogs')->where('id', $id)->delete();

        //return redirect()->route('blogs');  //แบบใช้ route
        //return redirect('\blogs'); //แบบใช้ url
        return redirect()->back(); //ลบแบบใช้ back จะไม่กลับหน้าแรกเมื่อแบ่ง pagination
    }
}

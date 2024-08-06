<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientType;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::with('ingredientType')->get();
        return view('ingredients.index', compact('ingredients'));
    }
    //คือการสร้างฟังก์ชั่น create สำหรับสร้างวัตถุดิบใหม่
    public function create(Request $request)
    {
        $query = $request->input('search');
        $ingredientTypes = IngredientType::when($query, function ($queryBuilder, $query) {
            return $queryBuilder->where('ingredient_type_name', 'like', "%$query%");
        })->get();

        if ($request->ajax()) {
            return response()->json($ingredientTypes);
        }

        return view('ingredients.create', compact('ingredientTypes'));
    }
    //คือการสร้างฟังก์ชั่น store สำหรับบันทึกข้อมูลวัตถุดิบใหม่
    public function store(Request $request)
    {
        $request->validate(
            [
                'ingredient_name' => 'required',
                'ingredient_detail' => 'required',
                'ingredient_type_id' => 'required|exists:ingredients_type,ingredient_type_id', // Ensure it exists in the database
                'ingredient_unit' => 'required',
            ],
            [
                'ingredient_name.required' => 'กรุณากรอกชื่อวัตถุดิบ',
                'ingredient_detail.required' => 'กรุณากรอกรายละเอียด',
                'ingredient_type_id.required' => 'กรุณาเลือกประเภทวัตถุดิบ',
                'ingredient_type_id.exists' => 'ประเภทวัตถุดิบที่เลือกไม่ถูกต้อง',
                'ingredient_unit.required' => 'กรุณากรอกรายละเอียด',
            ]
        );

        $data = [
            'ingredient_name' => $request->ingredient_name,
            'ingredient_detail' => $request->ingredient_detail,
            'ingredient_type_id' => $request->ingredient_type_id, // Include this field
            'ingredient_unit' => $request->ingredient_unit,
        ];

        // ตรวจสอบชื่อซ้ำ ถ้าซ้ำจะไม่สามารถเพิ่มได้ และจะแจ้งเตือน 
        $ingredient_name = $request->input('ingredient_name');
        if (Ingredient::isDuplicateIngredient($ingredient_name)) {
            return back()->withErrors(['ingredient_name' => 'วัตถุดิบนี้มีอยู่แล้ว'])->withInput();
        }

        Ingredient::create($data);

        return redirect()->route('ingredients')->with('success', 'เพิ่มวัตถุดิบใหม่สำเร็จ');
    }

    public function ChangeQuantity($id){
        $ingredient = Ingredient::findOrFail($id);
        $ingredientType = IngredientType::find($ingredient->ingredient_type_id); // ดึงข้อมูลประเภทวัตถุดิบที่เลือก

        return view('ingredients.changeQuantity', compact('ingredient', 'ingredientType'));
    }

    public function updateQuantity(Request $request, $id)
    {
        // ตรวจสอบและทำการ validate ข้อมูลที่ได้รับจาก request
        $request->validate([
            'ingredient_quantity' => 'required|numeric',
        ]);
    
        // ดึงข้อมูลวัตถุดิบที่ต้องการอัปเดต
        $ingredient = Ingredient::findOrFail($id);
    
        // อัปเดตเฉพาะฟิลด์ quantity
        $ingredient->ingredient_quantity = number_format($request->input('ingredient_quantity'), 2, '.', '');
        $ingredient->save(); // บันทึกการเปลี่ยนแปลงลงฐานข้อมูล
    
        // ส่งกลับไปยังหน้าที่ต้องการพร้อมกับข้อความสำเร็จ
        return redirect()->route('ingredients')->with('success', 'อัปเดตจำนวนวัตถุดิบสำเร็จ');
    }
    

    //คือการสร้างฟังก์ชั่น edit สำหรับแก้ไขข้อมูลวัตถุดิบ
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredientTypes = IngredientType::all(); // Fetch all ingredient types
        return view('ingredients.edit', compact('ingredient', 'ingredientTypes'));
    }
    //คือการสร้างฟังก์ชั่น update สำหรับบันทึกข้อมูลที่แก้ไขของวัตถุดิบ
    public function update(Request $request, $ingredient_id)
    {
        $request->validate([
            'ingredient_name' => 'required',
            'ingredient_detail' => 'required',
            'ingredient_type_id' => 'required|exists:ingredients_type,ingredient_type_id',
            'ingredient_unit' => 'required',
        ], [
            'ingredient_name.required' => 'กรุณากรอกชื่อวัตถุดิบ',
            'ingredient_detail.required' => 'กรุณากรอกรายละเอียด',
            'ingredient_type_id.required' => 'กรุณาเลือกประเภทวัตถุดิบ',
            'ingredient_type_id.exists' => 'ประเภทวัตถุดิบที่เลือกไม่ถูกต้อง',
            'ingredient_unit.required' => 'กรุณากรอกรายละเอียด',
        ]);

        $ingredient = Ingredient::findOrFail($ingredient_id);
        $ingredient->update([
            'ingredient_name' => $request->ingredient_name,
            'ingredient_detail' => $request->ingredient_detail,
            'ingredient_type_id' => $request->ingredient_type_id,
            'ingredient_unit' => $request->ingredient_unit,
        ]);

        return redirect()->route('ingredients')->with('success', 'บันทึกการแก้ไขวัตถุดิบแล้ว');
    }


    function delete($ingredient_id)
    {
        //ด้านล่างคือฟังก์ชั่นเช็คว่ามีข้อมูลอะไรที่เราดึงมา
        // dd(DB::table('blogs')->where('id', $id)->get());
        //ด้านล่างคือฟังก์ชั่นลบข้อมูล
        //แบบใช้ Eloquent ORM
        Ingredient::find($ingredient_id)->delete();
        //แบบใช้ query builder
        //DB::table('blogs')->where('id', $id)->delete();
        //return redirect()->route('blogs');  //แบบใช้ route
        //return redirect('\blogs'); //แบบใช้ url
        return redirect()->back()->with('success', 'ลบแล้ว');; //ลบแบบใช้ back จะไม่กลับหน้าแรกเมื่อแบ่ง pagination
    }
}

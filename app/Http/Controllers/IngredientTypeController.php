<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientType;
use App\Models\Ingredient;

class IngredientTypeController extends Controller
{
    function type()
    {
        $IngredientType = IngredientType::all();
        return view('ingredients.type.type', compact('IngredientType'));
    }

    //คือการสร้างฟังก์ชั่น create สำหรับสร้างประเภทวัตถุดิบ
    function typeCreate()
    {
        return view('ingredients.type.create');
    }

    //คือการสร้างฟังก์ชั่น store สำหรับบันทึกข้อมูลประเภทวัตถุดิบ
    function typeStore(Request $request)
    {
        $request->validate(
            [
                'ingredient_type_name' => 'required',
                'ingredient_type_detail' => 'required',
            ],
            [
                'ingredient_type_name.required' => 'กรุณากรอกชื่อประเภทวัตถุดิบ',
                'ingredient_type_name.unique' => 'ชื่อประเภทวัตถุดิบนี้มีอยู่แล้ว',
                'ingredient_type_detail.required' => 'กรุณากรอกรายละเอียด',
            ]
        );
        $data = [
            'ingredient_type_name' => $request->ingredient_type_name,
            'ingredient_type_detail' => $request->ingredient_type_detail,
        ];

        // ตรวจสอบชื่อซ้ำ ถ้าซ้ำจะไม่สามารถเพิ่มได้ และจะแจ้งเตือน 
        $ingredient_type_name = $request->input('ingredient_type_name');
        if (IngredientType::isDuplicateType($ingredient_type_name)) {
            return back()->withErrors(['ingredient_type_name' => 'ประเภทวัตถุดิบนี้มีอยู่แล้ว'])->withInput();
        }

        IngredientType::insert($data);
        return redirect()->route('ingredients.type.type')->with('success', 'เพิ่มประเภทวัตถุดิบสำเร็จ');
    }

    //คือการสร้างฟังก์ชั่น edit สำหรับแก้ไขข้อมูลประเภทวัตถุดิบ
    function typeEdit($ingredient_type_id)
    {
        $IngredientType = IngredientType::find($ingredient_type_id);
        return view('ingredients.type.edit', compact('IngredientType'));
    }

    //คือการสร้างฟังก์ชั่น update สำหรับบันทึกข้อมูลที่แก้ไขของประเภทวัตถุดิบ
    function typeUpdate(Request $request, $ingredient_type_id)
    {
        $request->validate(
            [
                'ingredient_type_name' => 'required',
                'ingredient_type_detail' => 'required',
            ],
            [
                'ingredient_type_name.required' => 'กรุณากรอกชื่อประเภทวัตถุดิบ',
                'ingredient_type_detail.required' => 'กรุณากรอกรายละเอียด',
            ]
        );

        $type = IngredientType::findOrFail($ingredient_type_id);
        $type->update([
            'ingredient_type_detail' => $request->ingredient_type_detail,
        ]);

        return redirect()->route('ingredients.type.type')->with('success', 'ประเภทวัตถุดิบถูกอัปเดตเรียบร้อยแล้ว');
    }

    //คือการสร้างฟังก์ชั่น delete สำหรับลบข้อมูลประเภทวัตถุดิบ
    public function typeDelete($ingredient_type_id)
    {
        $type = IngredientType::findOrFail($ingredient_type_id);
    
        // ตรวจสอบว่ามีข้อมูลที่อ้างอิงอยู่หรือไม่
        if ($type->ingredients()->count() > 0) {
            return redirect()->route('ingredients.type.type')
                             ->with('error', 'ไม่สามารถลบประเภทวัตถุดิบนี้ได้ เนื่องจากมีการอ้างอิงในข้อมูลวัตถุดิบ');
        }
    
        $type->delete();
        return redirect()->route('ingredients.type.type')
                         ->with('success', 'ประเภทวัตถุดิบถูกลบเรียบร้อยแล้ว');
    }
    
}

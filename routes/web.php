<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerHomeController;
use App\Http\Controllers\EmployeeHomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientTypeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuTypeController;
use App\Http\Controllers\EmployeeController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/no-access', function () {
    return view('no-access');
});

Auth::routes();
// เส้นทางสำหรับการล็อกเอาท
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//กรณีที่จะเข้าถึงหน้านี้ต้องเข้าสู่ระบบก่อน
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients')->middleware('auth');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index')->middleware('auth');

Route::group(['middleware' => ['auth', 'role:owner']], function () {
    Route::get('/owner', [HomeController::class, 'owner'])->name('home.owner');
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients/store', [IngredientController::class, 'store'])->name('ingredients.store');
    Route::get('/ingredients/edit/{ingredient_id}', [IngredientController::class, 'edit'])->name('ingredients.edit');
    Route::post('/ingredients/update/{ingredient_id}', [IngredientController::class, 'update'])->name('ingredients.update');
    Route::get('/ingredients/delete/{ingredient_id}', [IngredientController::class, 'delete'])->name('ingredients.delete');

    Route::get('/ingredients/changeQuantity/{ingredient_id}', [IngredientController::class, 'ChangeQuantity'])->name('ingredients.ChangeQuantity');
    Route::post('/ingredients/updateQuantity/{ingredient_id}', [IngredientController::class, 'updateQuantity'])->name('ingredients.updateQuantity');

    //จัดการประเภทของวัตถุดิบ
    Route::get('/ingredients/type', [IngredientTypeController::class, 'type'])->name('ingredients.type.type');
    Route::get('/ingredients/type/create', [IngredientTypeController::class, 'typeCreate'])->name('ingredients.type.create');
    Route::post('/ingredients/type/store', [IngredientTypeController::class, 'typeStore'])->name('ingredients.type.store');
    Route::get('/ingredients/type/edit/{ingredient_type_id}', [IngredientTypeController::class, 'typeEdit'])->name('ingredients.type.edit');
    Route::post('/ingredients/type/update/{ingredient_type_id}', [IngredientTypeController::class, 'typeUpdate'])->name('ingredients.type.update');
    Route::get('/ingredients/type/delete/{ingredient_type_id}', [IngredientTypeController::class, 'typeDelete'])->name('ingredients.type.delete');


    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
    // Route สำหรับแสดงฟอร์มบันทึกสูตรอาหาร
    Route::get('/menus/{menu_id}/create-recipe', [MenuController::class, 'createRecipe'])->name('menus.create_recipe');
    // Route สำหรับบันทึกสูตรอาหาร
    Route::post('/menus/{menu_id}/store-recipe', [MenuController::class, 'storeRecipe'])->name('menus.store_recipe');

    Route::get('menus/edit/{menu_id}', [MenuController::class, 'edit'])->name('menus.edit');
    Route::post('/menus/update/{menu_id}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('/menus/delete/{menu_id}', [MenuController::class, 'delete'])->name('menus.delete');

    Route::get('menus/{menu_id}/recipes', [MenuController::class, 'showRecipes'])->name('menus.recipes');
    Route::get('/recipes/{recipe_id}', [MenuController::class, 'show'])->name('recipes.show');


    Route::get('/menus/type', [MenuTypeController::class, 'type'])->name('menus.type.type');
    Route::get('/menus/type/create', [MenuTypeController::class, 'typeCreate'])->name('menus.type.create');
    Route::post('/menus/type/store', [MenuTypeController::class, 'typeStore'])->name('menus.type.store');
    Route::get('/menus/type/edit/{menu_type_id}', [MenuTypeController::class, 'typeEdit'])->name('menus.type.edit');
    Route::post('/menus/type/update/{menu_type_id}', [MenuTypeController::class, 'typeUpdate'])->name('menus.type.update');
    Route::get('/menus/type/delete/{menu_type_id}', [MenuTypeController::class, 'typeDelete'])->name('menus.type.delete');




    //จัดการพนักงาน
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/employees/{employee}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::post('/employees/{employee}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
});


// สำหรับเข้าถึงหน้านี้ต้องเข้าสู่ระบบก่อนและมีบทบาทเป็น employee
Route::group(['middleware' => ['auth', 'role:employee']], function () {
    Route::get('/employee', [HomeController::class, 'employee'])->name('home.employee');
});


//Route::prefix('employee')->group(function () {
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientTypeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuTypeController;
use App\Http\Controllers\EmployeeController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/no-access', function () {
    return view('no-access');
});

// เส้นทางการเข้าสู่ระบบ
Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ทุกตำแหน่งสามารถเข้าถึงได้ แต่ต้องเข้าสู่ระบบก่อน
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('profile/complete', [EmployeeController::class, 'completeProfile'])->name('employees.completeProfile');
    Route::post('profile/update', [EmployeeController::class, 'updateProfile'])->name('employees.updateProfile');
    
    Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

    // สำหรับพนักงานอย่างเดียว ต้องเข้าสู่ระบบและมีบทบาทเป็นพนักงาน
    Route::middleware('role:employee')->group(function () {
        Route::get('/employee', [HomeController::class, 'employee'])->name('home.employee');
        Route::get('profile/edit', [EmployeeController::class, 'editAdditionalInfo'])->name('employees.editAdditionalInfo');
        Route::post('profile/update', [EmployeeController::class, 'updateAdditionalInfo'])->name('employees.updateAdditionalInfo');
    });

    // สำหรับเจ้าของร้านอย่างเดียว ต้องเข้าสู่ระบบและมีบทบาทเป็นเจ้าของ
    Route::middleware('role:owner')->prefix('owner')->group(function () {
        Route::get('/', [HomeController::class, 'owner'])->name('home.owner');

        // Ingredient Management Routes
        Route::prefix('ingredients')->group(function () {
            Route::get('/', [IngredientController::class, 'index'])->name('ingredients.index');
            Route::get('/create', [IngredientController::class, 'create'])->name('ingredients.create');
            Route::post('/store', [IngredientController::class, 'store'])->name('ingredients.store');
            Route::get('/edit/{ingredient_id}', [IngredientController::class, 'edit'])->name('ingredients.edit');
            Route::post('/update/{ingredient_id}', [IngredientController::class, 'update'])->name('ingredients.update');
            Route::get('/delete/{ingredient_id}', [IngredientController::class, 'delete'])->name('ingredients.delete');
            Route::get('/changeQuantity/{ingredient_id}', [IngredientController::class, 'ChangeQuantity'])->name('ingredients.ChangeQuantity');
            Route::post('/updateQuantity/{ingredient_id}', [IngredientController::class, 'updateQuantity'])->name('ingredients.updateQuantity');
        });

        // Ingredient Type Management Routes
        Route::prefix('ingredients/type')->group(function () {
            Route::get('/', [IngredientTypeController::class, 'type'])->name('ingredients.type.type');
            Route::get('/create', [IngredientTypeController::class, 'typeCreate'])->name('ingredients.type.create');
            Route::post('/store', [IngredientTypeController::class, 'typeStore'])->name('ingredients.type.store');
            Route::get('/edit/{ingredient_type_id}', [IngredientTypeController::class, 'typeEdit'])->name('ingredients.type.edit');
            Route::post('/update/{ingredient_type_id}', [IngredientTypeController::class, 'typeUpdate'])->name('ingredients.type.update');
            Route::get('/delete/{ingredient_type_id}', [IngredientTypeController::class, 'typeDelete'])->name('ingredients.type.delete');
        });

        // Menu Management Routes
        Route::prefix('menus')->group(function () {
            Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
            Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
            Route::get('/{menu_id}/create-recipe', [MenuController::class, 'createRecipe'])->name('menus.create_recipe');
            Route::post('/{menu_id}/store-recipe', [MenuController::class, 'storeRecipe'])->name('menus.store_recipe');
            Route::get('/edit/{menu_id}', [MenuController::class, 'edit'])->name('menus.edit');
            Route::post('/update/{menu_id}', [MenuController::class, 'update'])->name('menus.update');
            Route::get('/delete/{menu_id}', [MenuController::class, 'delete'])->name('menus.delete');
            Route::get('/{menu_id}/recipes', [MenuController::class, 'showRecipes'])->name('menus.recipes');
            Route::get('/recipes/{recipe_id}', [MenuController::class, 'show'])->name('recipes.show');
        });

        // Menu Type Management Routes
        Route::prefix('menus/type')->group(function () {
            Route::get('/', [MenuTypeController::class, 'type'])->name('menus.type.type');
            Route::get('/create', [MenuTypeController::class, 'typeCreate'])->name('menus.type.create');
            Route::post('/store', [MenuTypeController::class, 'typeStore'])->name('menus.type.store');
            Route::get('/edit/{menu_type_id}', [MenuTypeController::class, 'typeEdit'])->name('menus.type.edit');
            Route::post('/update/{menu_type_id}', [MenuTypeController::class, 'typeUpdate'])->name('menus.type.update');
            Route::get('/delete/{menu_type_id}', [MenuTypeController::class, 'typeDelete'])->name('menus.type.delete');
        });

        // Employee Management Routes
        Route::prefix('employees')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
            Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
            Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
            
            Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
            Route::post('/{employee}/update', [EmployeeController::class, 'update'])->name('employees.update');
            Route::post('/{employee}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
            Route::get('/{id}', [EmployeeController::class, 'show'])->name('employees.show');
        });
    });
});

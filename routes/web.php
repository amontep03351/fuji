<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ProductImageController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('product-categories', ProductCategoryController::class);
    Route::post('/product-categories/update-order', [ProductCategoryController::class, 'updateOrder'])->name('product-categories.update-order'); 
    Route::post('/product-categories/toggle-status', [ProductCategoryController::class, 'toggleStatus'])->name('product-categories.toggle-status');  
    Route::get('product-categories/{category}/subcategories', [ProductCategoryController::class, 'showSubcategories'])->name('product-categories.subcategories.index');

    Route::get('product-categories/{category}/create_sub', [ProductCategoryController::class, 'createSub'])->name('product-categories.create_sub');
    Route::post('product-categories/{category}/store_sub', [ProductCategoryController::class, 'storeSub'])->name('product-categories.store_sub');
    // Route สำหรับแสดงหน้าแก้ไข subcategory
    Route::get('/product-categories/{category}/subcategories/{subcategory}/edit', [ProductCategoryController::class, 'editSub'])
        ->name('product-categories.subcategories.edit');

    // Route สำหรับอัปเดต subcategory
    Route::put('/product-categories/{category}/subcategories/{subcategory}', [ProductCategoryController::class, 'updateSub'])
        ->name('product-categories.subcategories.update');

    Route::post('/product-categories/update-order-sub', [ProductCategoryController::class, 'updateOrder_sub'])->name('product-categories.update-order-sub'); 
    Route::delete('/product-categories/{categoryId}/subcategories/{subcategoryId}', [ProductCategoryController::class, 'destroySubcategory'])
    ->name('product-categories.subcategories.destroy');



    // Route for Products (Resourceful)
    Route::resource('products', ProductController::class);    
    Route::delete('/images/{id}', [ProductImageController::class, 'destroy'])->name('images.destroy');
    Route::put('products/{product}/image', [ProductController::class, 'updateImage'])->name('products.update.image');
    Route::post('/products/{product}/images', [ProductImageController::class, 'store'])->name('images.store'); 
 
});



require __DIR__.'/auth.php';

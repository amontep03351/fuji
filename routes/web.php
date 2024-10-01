<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ProductImageController; 
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RelatedProductController; 
use App\Http\Controllers\AboutUsController; 
use App\Http\Controllers\ImageSliderController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\SystemImageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceImageController;
use App\Http\Controllers\RelatedServiceController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Session;

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
 
Route::get('lang/{locale}', function ($locale) {
    if($locale=='eng'){
        $locale ='en';
    }
    if (in_array($locale, ['en','jp'])) { // ตรวจสอบภาษาที่รองรับ\
       
        Session::put('locale', $locale);
        App::setLocale($locale);
    } 
    return redirect()->back();
})->name('setlocale');
Route::get('/dashboard', function () {
    
    return redirect('cwwebadmin');
})->name('dashboard');
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/system', [IndexController::class, 'system'])->name('system'); 
Route::get('/system-detail/{category}', [IndexController::class, 'systemdetail'])->name('system.detail');
Route::get('/catelist/{category}', [IndexController::class, 'catelist'])->name('catelist');
Route::get('/product-detail/{product}', [IndexController::class, 'productdetail'])->name('product.detail');
Route::get('/service', [IndexController::class, 'service'])->name('service');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');


Route::get('/cwwebadmin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('cwwebadmin');

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
    Route::delete('/product_images/{id}', [ProductImageController::class, 'destroy'])->name('product_images.destroy');
    Route::put('products/{product}/image', [ProductController::class, 'updateImage'])->name('products.update.image');
    Route::post('/products/{product}/images', [ProductImageController::class, 'store'])->name('images.store'); 
    Route::post('/products/toggle-status', [ProductController::class, 'toggleStatus'])->name('product.toggle-status');  
    Route::delete('/pdf/{id}', [PdfController::class, 'destroy'])->name('pdf.destroy');
    Route::post('products/{product}/pdfs', [PdfController::class, 'addFilePdf'])->name('pdfs.add'); 
    Route::get('/products/relate-management/{product}', [RelatedProductController::class, 'index'])->name('products.relate-management'); 
    Route::post('/products/{productId}/related-products', [RelatedProductController::class, 'saveRelatedProducts'])->name('products.save-related-products');


    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
    Route::put('/aboutus/update', [AboutUsController::class, 'update'])->name('aboutus.update');
    Route::put('/aboutus/update-image', [AboutUsController::class, 'updateImage'])->name('aboutus.update.image');

    Route::resource('image_sliders', ImageSliderController::class);
    Route::post('/image_sliders/update-order', [ImageSliderController::class, 'updateOrder'])->name('image_sliders.update-order'); 
    Route::post('/image_sliders/toggle-status', [ImageSliderController::class, 'toggleStatus'])->name('image_sliders.toggle-status');  

    Route::resource('System', SystemController::class);
    Route::post('/System/update-order', [SystemController::class, 'updateOrder'])->name('System.update-order'); 
    Route::post('/System/toggle-status', [SystemController::class, 'toggleStatus'])->name('System.toggle-status');
    Route::delete('/System_images/{id}', [SystemImageController::class, 'destroy'])->name('system_images.destroy'); 
    Route::put('System/{systems}/image', [SystemController::class, 'updateImage'])->name('system.update.image');
    Route::post('/System/{systems}/images', [SystemImageController::class, 'store'])->name('system_image.store'); 


    Route::resource('services', ServiceController::class);      
    Route::post('/services/update-order', [ServiceController::class, 'updateOrder'])->name('services.update-order'); 
    Route::post('/services/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
    Route::delete('/images/{id}', [ServiceImageController::class, 'destroy'])->name('service_images.destroy');
    Route::put('services/{services}/image', [ServiceController::class, 'updateImage'])->name('services.update.image');
    Route::post('/services/{services}/images', [ServiceImageController::class, 'store'])->name('service_image.store'); 
    Route::get('/services/{service}/related', [RelatedServiceController::class, 'index'])->name('services.related.index');
    Route::post('/services/{service}/related/save', [RelatedServiceController::class, 'saveRelatedServices'])->name('services.related.save');
    
    
    Route::get('/contact-us', [ContactUsController::class, 'edit'])->name('contactus.edit');
    Route::put('/contact-us', [ContactUsController::class, 'update'])->name('contactus.update');
});



require __DIR__.'/auth.php';

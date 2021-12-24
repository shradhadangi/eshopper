<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return view('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('subcategory', App\Http\Controllers\Admin\SubcategoryController::class);
    Route::get('subcategory/create/{id?}', [
        'as' => 'subcategory.create',
        'uses' => 'App\Http\Controllers\Admin\SubcategoryController@create'
        ]);
    Route::resource('products','App\Http\Controllers\Admin\ProductController',['except' => 'subCat']);
    Route::post('products/subcat', [
        'as' => 'products.subcat',
        'uses' => 'App\Http\Controllers\Admin\ProductController@subCat'
        ]);
    Route::resource('product-images',App\Http\Controllers\Admin\ProductImageController::class);
    Route::get('product-images/create/{id?}', [
        'as' => 'product-images.create',
        'uses' => 'App\Http\Controllers\Admin\ProductImageController@create'
        ]);
    Route::resource('basic-detail',App\Http\Controllers\Admin\BasicDetailController::class);
    Route::resource('slider',App\Http\Controllers\Admin\SliderController::class);
    Route::resource('testimonial',App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('about',App\Http\Controllers\Admin\AboutController::class);
    Route::resource('contact-enquiries',App\Http\Controllers\Admin\EnquiryController::class);

});

// Front end routing
Route::get('/site', [App\Http\Controllers\FrontController::class, 'index'])->name('site');
Route::get('product/{category_id?}/{subcategory_id?}', [App\Http\Controllers\FrontController::class, 'products'])->name('product');
Route::get('contact-us', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::post("save-enquiry",[App\Http\Controllers\FrontController::class,'save_enquiry'])->name('save_enquiry');
Route::get('about-us', [App\Http\Controllers\FrontController::class, 'about_us'])->name('about_us');
// Route::get('/productsdfg/{category_id?}', function ($category_id) {
//     //
// });


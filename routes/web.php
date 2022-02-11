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
    Route::resource('products','App\Http\Controllers\Admin\Productcontroller',['except' => 'subCat']);
    Route::post('products/subcat', [
        'as' => 'products.subcat',
        'uses' => 'App\Http\Controllers\Admin\Productcontroller@subCat'
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
        Route::resource('customer',App\Http\Controllers\Admin\CustomersController::class);
        Route::resource('order',App\Http\Controllers\Admin\OrderController::class);
        Route::get('product-reviews/{id}',[App\Http\Controllers\Admin\Productcontroller::class,'product_reviews'])->name('product-reviews');
        Route::post('delete-review/{id}',[App\Http\Controllers\Admin\Productcontroller::class,'delete_review'])->name('delete-review');
        Route::get('newsletters',[App\Http\Controllers\Admin\EnquiryController::class,'newsletters'])->name('newsletters');
        Route::post('delete-newsletter/{id}',[App\Http\Controllers\Admin\EnquiryController::class,'delete_newsletter'])->name('delete-newsletter');
        Route::resource('color',App\Http\Controllers\Admin\ColorController::class);
        Route::resource('size',App\Http\Controllers\Admin\SizeController::class);


});

// Front end routing
Route::get('/site', [App\Http\Controllers\FrontController::class, 'index'])->name('site');
Route::get('product/{category_id?}/{subcategory_id?}', [App\Http\Controllers\FrontController::class, 'products'])->name('product');
Route::get('/produts', [App\Http\Controllers\FrontController::class, 'getProducts'])->name('produts');
Route::get('contact-us', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::post("save-enquiry",[App\Http\Controllers\FrontController::class,'save_enquiry'])->name('save_enquiry');
Route::post("save_newsletter",[App\Http\Controllers\FrontController::class,'save_newsletter'])->name('save_newsletter');
Route::get('about-us', [App\Http\Controllers\FrontController::class, 'about_us'])->name('about_us');
Route::get('product-detail/{product_id}', [App\Http\Controllers\FrontController::class, 'product_detail'])->name('product-detail');
Route::get('register', [App\Http\Controllers\FrontController::class, 'registration'])->name('register');
Route::post("save-customer",[App\Http\Controllers\FrontController::class,'save_customer'])->name('save-customer');
Route::post("add_to_cart",[App\Http\Controllers\FrontController::class,'add_to_cart'])->name('add_to_cart');
Route::get('cart', [App\Http\Controllers\FrontController::class, 'cart_data'])->name('cart');
Route::post('delete-cart/', [App\Http\Controllers\FrontController::class, 'delete_cart'])->name('delete-cart');
Route::get('clear-cart', [App\Http\Controllers\FrontController::class, 'clear_cart'])->name('clear-cart');
Route::get('ajax-cart', [App\Http\Controllers\FrontController::class, 'ajax_cart'])->name('ajax-cart');
Route::post('place-order/', [App\Http\Controllers\FrontController::class, 'place_order'])->name('place-order');
Route::post("login_process",[App\Http\Controllers\FrontController::class,'login_process'])->name('login_process');
Route::post("cart_update",[App\Http\Controllers\FrontController::class,'cart_update'])->name('cart_update');
Route::post("/place-order",[App\Http\Controllers\FrontController::class,'place_order'])->name('place-order');
Route:: get('logout', function(){
    session()->forget('USER_LOGIN');
    session()->forget('USER_ID');
    session()->forget('USER_NAME');
    session()->forget('USER_TEMP_ID');
    return redirect('site');
});
Route::get("/profile",[App\Http\Controllers\FrontController::class,'profile'])->name('profile');
Route::post("/update-profile",[App\Http\Controllers\FrontController::class,'update_profile'])->name('update-profile');
Route::post("/review-submit",[App\Http\Controllers\FrontController::class,'review_submit'])->name('review-submit');
Route::get("/my-orders",[App\Http\Controllers\FrontController::class,'my_orders'])->name('my-orders');
Route::get("/order-detail/{id}",[App\Http\Controllers\FrontController::class,'order_detail'])->name('order-detail');
Route::get("/change-password",[App\Http\Controllers\FrontController::class,'change_password'])->name('change-password');
Route::post("/update-password",[App\Http\Controllers\FrontController::class,'update_password'])->name('update-password');
Route::post("/cancel-order",[App\Http\Controllers\FrontController::class,'cancel_order'])->name('cancel-order');
// Route::get('/productsdfg/{category_id?}', function ($category_id) {
//     //
// });

//
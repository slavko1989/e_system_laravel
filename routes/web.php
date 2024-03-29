<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CommentController;









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
Route::controller(AdminController::class)->middleware(['admin'])->group(function() {
    Route::get('/admin/index','index');
    Route::get('/orders/all_orders','all_orders');
    Route::post('/orders/all_orders/{id}','order_status');
    Route::get('/users/all_users','all_users');
    Route::post('/users/all_users/{id}','update_user_status')->name('update_status');

});

Route::controller(RoleController::class)->middleware(['admin'])->group(function() {
    Route::get('/users/role','create');
    Route::post('/users/role','store');
    Route::get('/users/role/{id}','delete');
    Route::get('/users/edit_role/{id}','edit');
    Route::post('/users/edit_role/{id}','update');
       
});

Route::controller(HomeController::class)->group(function() {
    Route::get('/','index');
    Route::get('home/details/{id}','details');
    Route::get('home/search','search')->name('search');
    Route::get('home/show_by_cat/{id}','show_by_cat');
    Route::get('home/show_by_brands/{id}','show_by_brand');
    Route::get('home/show_by_genders/{id}','show_by_gender');


});


Route::controller(CategoryController::class)->middleware(['admin'])->group(function() {
    Route::get('/categorys/create','create');
    Route::post('/categorys/create','store');
    Route::get('/categorys/create/{id}','delete');
    Route::get('/categorys/edit/{id}','edit');
    Route::post('/categorys/update/{id}','update');
});

Route::controller(BrandController::class)->middleware(['admin'])->group(function() {
    Route::get('/brands/create','create');
    Route::post('/brands/create','store');
    Route::get('/brands/create/{id}','delete');
    Route::get('/brands/edit/{id}','edit');
    Route::post('/brands/update/{id}','update');
});

Route::controller(GenderController::class)->middleware(['admin'])->group(function() {
    Route::get('/genders/create','create');
    Route::post('/genders/create','store');
    Route::get('/genders/create/{id}','delete');
    Route::get('/genders/edit/{id}','edit');
    Route::post('/genders/update/{id}','update');
});

Route::controller(ProductController::class)->middleware(['admin'])->group(function() {
    Route::get('/products/create','create');
    Route::post('/products/create','store');
    Route::get('/products/create/{id}','delete');
    Route::get('/products/edit/{id}','edit');
    Route::post('/products/update/{id}','update');
});

Route::controller(CartController::class)->group(function() {
    Route::get('/users/cart','cart');
    Route::post('/users/cart/{id}','add_to_cart'); 
    Route::get('/users/cart/{id}','delete');
});

Route::controller(OrderController::class)->group(function() {
    Route::get('/users/order','order');
    Route::post('/users/order','add_to_order'); 
    Route::get('/users/orders_by_date/{date}','showOrdersByDate');
    Route::get('/orders/notify','listNotification')->middleware(['admin']);
});

Route::controller(NewsletterController::class)->group(function() {
    Route::post('/','store')->name('news');
    Route::get('/subs/subs','create')->middleware(['admin']);
    Route::get('/subs/subs/{id}','delete')->middleware(['admin']);
});

Route::controller(CommentController::class)->group(function() {
    Route::post('home/details/{product_id}','store')->name('comm');
    Route::get('/users/comments','create');
    Route::get('/users/comments/{id}','delete');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

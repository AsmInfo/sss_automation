<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomationController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\PaymentController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('pages.home');
});


Route::patch('update-cart', [AutomationController::class, 'update'])->name('update-cart');

Route::get('/product/{slug}', [AutomationController::class, 'product_detail'])->name('detail');
Route::get('/subcategory/{slug}', [AutomationController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory', [AutomationController::class, 'sub_product'])->name('sub_product');
Route::get('/productlist/{name}',[AutomationController::class,'products'])->name('productlist');

Route::get('add-to-cart/{id}', [AutomationController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart', [AutomationController::class, 'cart'])->name('cart');
Route::delete('remove-from-cart', [AutomationController::class, 'remove'])->name('remove-from-cart');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});
Route::post('userdetails',[LoginRegisterController::class, 'profile'])->name('userdetails');
Route::get('/billing',[LoginRegisterController::class, 'billing'])->name('billing');
Route::get('payment', [PaymentController::class, 'index'])->name('payment');
Route::post('razorpay-payment', [PaymentController::class, 'store'])->name('razorpay.payment.store');

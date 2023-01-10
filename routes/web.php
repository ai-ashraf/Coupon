<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// FrontEnd Route Start Here

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::post('/apply/coupon', [CouponController::class, 'coupon'])->name('coupon.apply');
// FrontEnd Route End Here

// Backend Route Start
Route::prefix('admin')->group(function () { 
Route::get('/', [BackendController::class, 'index'])->name('home');

Route::resource('coupons', CouponController::class);

});
// Backend Route End
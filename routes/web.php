<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});
Route::get('/shop',[ShopController::class , 'index']);
Route::get('/contact', function () {
    return view('contact' );
});

Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::get('users/password/{user}', function(User $user)
{
    return view('user.password' , [
        'user'=>$user
    ]);
});
Route::get('/products', [HomeController::class, 'index']);

Route::post('/login' , [AuthController::class , 'login'])->name('login');
Route::post('/register' , [AuthController::class , 'register'])->name('register');
Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
Route::post('/cart/add' , [CartController::class , 'addProduct'])->name('cart.add');
Route::get('shouldLogin' , function(){
    return redirect('/')->with(["shouldLogin"=>"yes" , "loginWarning"=>"You should login before completing the checkout"]);
})->name('shouldLogin');
Route::get('/cart' , function (){
return view('cart');
});
Route::post('/cart/remove' , [CartController::class , 'removeProduct']);
Route::resource('orders' , OrderController::class)->middleware('auth');
Route::post('orders/payed' , [OrderController::class , 'payed'])->middleware('auth')->name('orders.payed');
Route::post('orders/reviewd' , [OrderController::class , 'reviewd'])->middleware('auth')->name('orders.reviewd');
Route::get('user/orders/{id}' ,[UserController::class , 'listOrders'])->middleware('auth')->name('user.orders.list');
// require __DIR__ . '/auth.php';

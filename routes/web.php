<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ChangeController;


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

Route::get('/',
           [HomeController::class, 'show']
)->name('home');

Route::post('/',
            [HomeController::class, 'show']
)->name('home');

Route::get('/register',
           [RegisterController::class, 'create']
)->name('register');

Route::post('/register',
            [RegisterController::class, 'store']
);

Route::get('/login',
           [LoginController::class, 'show']
)->name('login');

Route::post('/login',
            [LoginController::class, 'authenticate']
);

Route::get('/logout',
           [LogoutController::class, 'logout']
)->middleware('auth', 'changed_password')
 ->name('logout');

Route::get('/user/{pubkey}/pay',
           [PayController::class, 'show']
)->middleware(['auth','changed_password'])
  ->name('pay');

Route::get('/user/{pubkey}',
           [UserController::class, 'show']
)->name('user');

Route::post('/delete/confirm',
            [UserController::class, 'confirm']
)->middleware(['auth','changed_password']);


Route::post('/delete',
            [UserController::class, 'execute_deletion']
)->middleware(['auth','changed_password']);


Route::post('/pay/confirm',
            [PayController::class, 'confirm']
)->middleware(['auth','changed_password']);

Route::post('/pay',
            [PayController::class, 'execute_payment']
)->middleware(['auth','changed_password']);

Route::get('/buy',
            [BuyController::class, 'show']
)->middleware(['auth','changed_password']);

Route::get('/buy/cc/amount',
            [BuyController::class, 'show_buy_cc_amount']
)->middleware(['auth','changed_password']);

Route::post('/buy/cc',
            [BuyController::class, 'show_buy_cc']
)->middleware(['auth','changed_password']);

Route::post('/buy/complete',
            [BuyController::class, 'complete_payment']
)->middleware(['auth','changed_password']);

Route::get('/admin/dashboard',
           [AdminController::class, 'show_dash']
)->middleware(['auth','changed_password', 'admin']);

Route::get('/change',
           [ChangeController::class, 'show']
)->middleware('auth')->name('change');

Route::post('/change',
           [ChangeController::class, 'change']
)->middleware('auth');

Route::get('/reset',
           [PasswordResetController::class, 'show']
);

Route::post('/reset',
            [PasswordResetController::class, 'store']
);

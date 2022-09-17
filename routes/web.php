<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PayController;


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
)->middleware('auth')
 ->name('logout');

Route::get('/user/{pubkey}/pay',
           [PayController::class, 'show']
)->middleware('auth')
  ->name('pay');

Route::post('/user/{pubkey}/pay', function() {
    return 'User '.$pubkey. ' payed!';
}
)->middleware('auth');

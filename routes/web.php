<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::middleware(['auth'])->group(function () {
    
    Route::get('/change',
               [ChangeController::class, 'show']
    )->name('change');

    Route::post('/change',
                [ChangeController::class, 'change']
    );

});


Route::middleware(['auth', 'changed_password'])->group(function () {

    Route::controller(PayController::class)->group(function() {
        
        Route::get('/user/{pubkey}/pay','show')->name('pay');

        Route::post('/pay/confirm','confirm');

        Route::post('/pay','execute_payment');

        
    });

    Route::controller(BuyController::class)->group(function() {

        Route::get('/buy','show');

        Route::get('/buy/cc/amount','show_buy_cc_amount');

        Route::post('/buy/cc','show_buy_cc');

        Route::get('/buy/voucher','show_buy_voucher');

        Route::post('/buy/voucher/complete','buy_with_voucher');

        Route::post('/buy/complete','complete_payment');
        
    });

    Route::get('/logout',
               [LogoutController::class, 'logout']
    )->name('logout');

    Route::post('/delete/confirm',
                [UserController::class, 'confirm']
    );

    Route::post('/delete',
                [UserController::class, 'execute_deletion']
    );

});

Route::middleware(['auth', 'changed_password', 'admin'])->group(function () {
    Route::get('/admin/dashboard',
               [AdminController::class, 'show_dash']
    )->name('admin.dashboard');
});


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



Route::get('/user/{pubkey}',
           [UserController::class, 'show']
)->name('user');



Route::get('/reset',
           [PasswordResetController::class, 'show']
);

Route::post('/reset',
            [PasswordResetController::class, 'store']
);

Route::get('/lang/{locale}', function($locale) {
    if (! in_array($locale, ['en', 'pl', 'it'])) {
        abort(400);
    }

    App::setLocale($locale);

    return redirect('/');
});

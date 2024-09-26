<?php

use App\Http\Controllers\AdministrativeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\CheckerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers/store', [CustomersController::class, 'stores'])->name('products.byStoreView');
Route::post('/admin/search', [AdministrativeController::class, 'search'])->name('admin.search');
Route::get('/customer/cart', function () {
    if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
        return redirect()->route('login.index');
    } else {
        return redirect()->route('customer.index');
    }
})->name('cart.show');

Route::post('/checker/sell-cart', [CheckerController::class, 'buyCart'])->name('cart.sell');

Route::post('/customer/add-to-cart/{product}', [CustomersController::class, 'addToCart'])->name('cart.add');

Route::get('/logout', function () {
    session()->forget('user');
    session()->forget('cart');
    return redirect()->route('login.index');
});

Route::get('/admin/show-stores', function () {
    if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
        return redirect()->route('login.index');
    } else {
        return redirect()->route('admin.showStores');
    }
    return view('adminView');
});

Route::get('/admin/show-products', function () {
    if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
        return redirect()->route('login.index');
    } else {
        return redirect()->route('admin.showProducts');
    }
    return view('adminView');
});

Route::get('/admin/show-employers', function () {
    if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
        return redirect()->route('login.index');
    } else {
        return redirect()->route('admin.showEmployers');
    }
    return view('adminView');
});

Route::get('/admin/show-customers', function () {
    if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
        return redirect()->route('login.index');
    } else {
        return redirect()->route('admin.showCustomers');
    }
    return view('adminView');
});

Route::get('/employers/store', function () {
    if (session()->get('user')->role->uid == 2) {
        return view('employers.storeView');
    } else {
        return redirect()->route('login.index');
    }
})->name('storeView');

Route::get('/employers/inventary', function () {
    if (session()->get('user')->role->uid == 2) {
        return view('employers.storeView');
    } else {
        return view('employers.inventaryView');
    }
})->name('inventaryView');

Route::get('admin/products', [AdministrativeController::class, 'showProducts'])->name('admin.showProducts');

Route::get('admin/employers', [AdministrativeController::class, 'showEmployers'])->name('admin.showEmployers');

Route::get('admin/customers', [AdministrativeController::class, 'showCustomers'])->name('admin.showCustomers');

Route::get('admin/stores', [AdministrativeController::class, 'showStores'])->name('admin.showStores');

Route::resource('stores', StoresController::class);

Route::resource('checkers', CheckerController::class);

Route::resource('admin', AdministrativeController::class);

Route::resource('customers', CustomersController::class);

Route::resource('login', LoginController::class);

Route::resource('users', UsersController::class);

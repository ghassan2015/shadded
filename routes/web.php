<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'getLogin'])->name('login');
Route::post('admin/postLogin', [App\Http\Controllers\Admin\Auth\AuthController::class, 'postLogin'])->name('admin.login.post');

Route::group( ['prefix'=>'admin','middleware'=>'auth:admin'],function () {

    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'index'])->name('admin.admins.index');
        Route::get('/getAdmin', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'getAllAdmin'])->name('admin.admins.getAdmin');
        Route::get('/create', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'create'])->name('admin.admins.create');


        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'edit'])->name('admin.admins.edit');
        Route::post('/store', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'store'])->name('admin.admins.store');
        Route::post('/update', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'update'])->name('admin.admins.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'delete'])->name('admin.admins.delete');
        Route::post('/updateStatus', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'updateStatus'])->name('admin.admins.updateStatus');


    });
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/profile', [\App\Http\Controllers\Admin\Profile\ProfileController::class, 'getProfile'])->name('admin.settings.getProfile');

        Route::post('/postProfile', [\App\Http\Controllers\Admin\Profile\ProfileController::class, 'postProfile'])->name('admin.settings.postProfile');

        Route::get('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
        Route::get('/changePassword', [\App\Http\Controllers\Admin\Profile\ProfileController::class, 'getChange'])->name('settings.getChange');
        Route::post('/postChangePassword', [\App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('profile.changePasswordProfile');


    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Role\RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/getAllRole', [\App\Http\Controllers\Admin\Role\RoleController::class, 'getAllRole'])->name('admin.roles.getRoles');
        Route::get('/create', [\App\Http\Controllers\Admin\Role\RoleController::class, 'create'])->name('admin.roles.create');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Role\RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::post('/store', [\App\Http\Controllers\Admin\Role\RoleController::class, 'store'])->name('admin.roles.store');
        Route::post('/update', [\App\Http\Controllers\Admin\Role\RoleController::class, 'update'])->name('admin.roles.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\Role\RoleController::class, 'delete'])->name('admin.roles.delete');
        Route::post('/updateStatus', [\App\Http\Controllers\Admin\Role\RoleController::class, 'updateStatus'])->name('admin.roles.updateStatus');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Users\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/getAllUsers', [\App\Http\Controllers\Admin\Users\UserController::class, 'getAllUsers'])->name('admin.users.getAllUser');
        Route::post('/delete', [\App\Http\Controllers\Admin\Users\UserController::class, 'delete'])->name('admin.users.delete');
        Route::post('/updateStatus', [\App\Http\Controllers\Admin\Users\UserController::class, 'updateStatus'])->name('admin.users.updateStatus');
        Route::get('/view/{id}', [\App\Http\Controllers\Admin\Users\UserController::class, 'view'])->name('admin.users.view');

    });

    Route::group(['prefix' => 'drivers'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Drivers\DriverController::class, 'index'])->name('admin.drivers.index');
        Route::get('/getALlDriver', [\App\Http\Controllers\Admin\Drivers\DriverController::class, 'getALlDriver'])->name('admin.drivers.getALlDriver');
        Route::post('/delete', [\App\Http\Controllers\Admin\Drivers\DriverController::class, 'delete'])->name('admin.drivers.delete');
        Route::post('/updateStatus', [\App\Http\Controllers\Admin\Drivers\DriverController::class, 'updateStatus'])->name('admin.drivers.updateStatus');
        Route::get('/view/{id}', [\App\Http\Controllers\Admin\Drivers\DriverController::class, 'view'])->name('admin.drivers.view');
    });
    Route::group(['prefix' => 'drivers'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Support\SupportController::class, 'index'])->name('admin.drivers.index');
        Route::get('/getSupport', [\App\Http\Controllers\Admin\Support\SupportController::class, 'getSupport'])->name('admin.support.getSupport');

        Route::post('/replay', [\App\Http\Controllers\Admin\Support\SupportController::class, 'Reply'])->name('admin.support.Reply');

    });

    Route::group(['prefix' => 'requests'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Requests\RequestController::class, 'index'])->name('admin.requests.index');
        Route::get('/getAllRequest', [\App\Http\Controllers\Admin\Requests\RequestController::class, 'getAllRequest'])->name('admin.requests.getAllRequest');
        Route::get('/view/{id}', [\App\Http\Controllers\Admin\Requests\RequestController::class, 'view'])->name('admin.requests.view');

    });
    });

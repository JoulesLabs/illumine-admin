<?php

/**
 * This routes is used for Control Panel of Cassetex
 */

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest:admin', 'namespace' => 'JoulesLabs\IllumineAdmin\Controllers'], function() {
    Route::get('/login', 'AuthController@loginPage')->name('auth.login.page');
    Route::post('/login', 'AuthController@login')->name('auth.login');
});

Route::group(['middleware' => 'auth:admin', 'namespace' => 'JoulesLabs\IllumineAdmin\Controllers'], function() {
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    //Dashboard
    Route::view('/welcome', 'admin.home')->name('home');
    // Route::get('/welcome', 'ReportsAndStatsController@dashboard')->name('home');

//     Route::get('/users', 'UserController@index')->name('user.index');
//     Route::get('/users/create', 'UserController@create')->name('user.create');
//     Route::post('/users', 'UserController@store')->name('user.store');
//     Route::get('/users/{id}/edit', 'UserController@edit')->name('user.edit');
//     Route::put('/users/{id}', 'UserController@update')->name('user.update');
//     Route::put('/users/{id}/disable', 'UserController@disable')->name('user.disable');
//     Route::put('/users/{id}/enable', 'UserController@enable')->name('user.enable');
//     Route::put('/users/{id}/banned', 'UserController@banned')->name('user.banned');
    // Route::get('/users/change_password', 'UserController@changePassword')->name('user.change_password_page');
    Route::get('/users/change_password', 'UserController@changePassword')->name('user.change_password_page');
//     Route::post('/users/change_password', 'UserController@updatePassword')->name('user.change_password');
//     Route::get('/users/profile', 'UserController@profile')->name('user.profile');
//     Route::post('/users/{id}/forget_password', 'UserController@forgetPassword')->name('user.forget_password');


//     Route::get('/roles', 'RoleController@index')->name('role.index');
//     Route::get('/roles/create', 'RoleController@create')
//         //->middleware('permit:role.create')
//         ->name('role.create');
//     Route::post('/roles', 'RoleController@store')->name('role.store');
//     Route::get('/roles/{id}/edit', 'RoleController@edit')->name('role.edit');
//     Route::put('/roles/{id}', 'RoleController@update')->name('role.update');

//     // drivers
//     Route::get('/drivers', 'DriverController@index')->name('driver.index');
//     Route::get('/drivers/create', 'DriverController@create')->name('driver.create');
//     Route::post('/drivers', 'DriverController@store')->name('driver.store');
//     Route::get('/drivers/{id}/verify', 'DriverController@showOtpForm')->name('driver.verify_page');
//     Route::put('/drivers/{id}/verify', 'DriverController@verifyOtp')->name('driver.verify_otp');
//     Route::get('/drivers/regenerate_otp', 'DriverController@regenerate_otp')->name('driver.regenerate_otp');
//     Route::get('/drivers/forget_password', 'DriverController@forget_password')->name('driver.forget_password');
//     Route::post('/drivers/{id}/regenerate', 'DriverController@regenerate')->name('driver.regenerate');
//     Route::get('/drivers/{id}/topUp', 'DriverController@createTopUp')->name('driver.createTopUp');
//     Route::post('/drivers/{id}/topUp', 'DriverController@storeTopUp')->name('driver.storeTopUp');
//     Route::get('/drivers/{id}/edit', 'DriverController@edit')->name('driver.edit');
//     Route::post('/drivers/{id}', 'DriverController@update')->name('driver.update');
//     Route::get('/drivers/{id}', 'DriverController@show')->name('driver.show');
//     Route::get('/drivers/{id}/transactions', 'DriverController@showTransactions')->name('driver.transaction');

//     //battery
//     Route::get('/battery', 'BatteryController@index')->name('battery.index');
//     Route::get('/battery/create', 'BatteryController@create')->name('battery.create');
//     Route::post('/battery', 'BatteryController@store')->name('battery.store');

//     // stations
//     Route::get('/stations', 'StationController@index')->name('station.index');
//     Route::get('/stations/create', 'StationController@create')->name('station.create');
//     Route::post('/stations', 'StationController@store')->name('station.store');
//     Route::get('/stations/{id}/edit', 'StationController@edit')->name('station.edit');
//     Route::post('/stations/{id}', 'StationController@update')->name('station.update');
//     Route::get('/stations/{id}', 'StationController@show')->name('station.show');
//     Route::post('/disable-station', 'StationController@disableSwapStation')->name('disable_station');
//     Route::post('/enable-station', 'StationController@enableSwapStation')->name('enable_station');
//     Route::get('/station-qr', 'StationController@showStationQR')->name('station_qr');



//     //slot
//     Route::get('/slot', 'SlotController@index')->name('slot.index');
//     Route::get('/slot/create', 'SlotController@create')->name('slot.create');
//     Route::post('/slot', 'SlotController@store')->name('slot.store');
//     Route::post('/slot/enable-box-door', 'SlotController@enableBoxDoor')->name('slot.enable_box_door');
//     Route::post('/slot/disable-box-door', 'SlotController@disableBoxDoor')->name('slot.disable_box_door');
//     Route::post('/slot/open-box-door', 'SlotController@doorOpen')->name('slot.open_box_door');
//     // ---------------------
//     Route::get('/slot/{id}/edit', 'SlotController@edit')->name('slot.edit');
//     Route::put('/slot/{id}', 'SlotController@update')->name('slot.update');
//     // ---------------------
//     Route::get('/slot/{id}', 'SlotController@show')->name('slot.show');
//     Route::get('/battery/{id}/edit', 'BatteryController@edit')->name('battery.edit');
//     Route::post('/battery/{id}', 'BatteryController@update')->name('battery.update');
//     Route::get('/battery/{id}', 'BatteryController@show')->name('battery.show');

//     //orders
//     Route::get('/orders', 'OrderController@index')->name('order.index');
//     Route::get('/orders/{id}', 'OrderController@show')->name('order.show');

});

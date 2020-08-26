<?php



Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('admin/users', 'UsersController@index')->name('admin.users.index');

Route::post('imperonations', 'ImpersonationsController@store')->name('impersonations.store');
Route::delete('imperonations', 'ImpersonationsController@destroy')->name('impersonations.destroy');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

<?php

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

Route::get('/', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login.form');
Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('/admin/login', 'Admin\LoginController@login')->name('admin.do.login');


Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::post('/generate-prizes', 'Admin\DrawGeneratorController@generatePrizes')->name('admin.generate-prizes');
    Route::post('/generate-prize', 'Admin\DrawGeneratorController@generatePrize')->name('admin.generate-prize');
    Route::post('/clear-winners', 'Admin\WinnersController@clearWinners')->name('admin.clear-winners');
    Route::post('/re-seed', 'Admin\ReseederController@reSeed')->name('admin.re-seed');
});

Route::group(['prefix' => 'member'], function() {
    Route::get('/', 'Member\MemberController@index')->name('member.index');
});
<?php

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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    // return what you want
});

Route::get('errors-403', function() {
    return view('errors.403');
});
Route::group(['namespace' => 'Admin'], function() {

    Route::group(['namespace' => 'Auth'], function() {
        Route::get('/', 'LoginController@login')->name('admin.login');
        Route::post('/', 'LoginController@postLogin');
        Route::get('/register', 'RegisterController@getRegister')->name('admin.register');
        Route::post('/register', 'RegisterController@postRegister');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
        Route::get('/forgot/password', 'ForgotPasswordController@forgotPassword')->name('admin.forgot.password');
    });

    Route::group(['middleware' =>['auth']], function() {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'group-permission'], function(){
            Route::get('/','GroupPermissionController@index')->name('group.permission.index');
            Route::get('/create','GroupPermissionController@create')->name('group.permission.create');
            Route::post('/create','GroupPermissionController@store');

            Route::get('/update/{id}','GroupPermissionController@edit')->name('group.permission.update');
            Route::post('/update/{id}','GroupPermissionController@update');

            Route::get('/delete/{id}','GroupPermissionController@destroy')->name('group.permission.delete');
        });

        Route::group(['prefix' => 'permission'], function(){
            Route::get('/','PermissionController@index')->name('permission.index');
            Route::get('/create','PermissionController@create')->name('permission.create');
            Route::post('/create','PermissionController@store');

            Route::get('/update/{id}','PermissionController@edit')->name('permission.update');
            Route::post('/update/{id}','PermissionController@update');

            Route::get('/delete/{id}','PermissionController@delete')->name('permission.delete');
        });

        Route::group(['prefix' => 'role'], function(){
            Route::get('/','RoleController@index')->name('role.index')->middleware('permission:danh-sach-vai-tro|toan-quyen-quan-ly');
            Route::get('/create','RoleController@create')->name('role.create')->middleware('permission:them-vai-tro|toan-quyen-quan-ly');
            Route::post('/create','RoleController@store');

            Route::get('/update/{id}','RoleController@edit')->name('role.update')->middleware('permission:chinh-sua-vai-tro|toan-quyen-quan-ly');
            Route::post('/update/{id}','RoleController@update');

            Route::get('/delete/{id}','RoleController@delete')->name('role.delete')->middleware('permission:xoa-vai-tro|toan-quyen-quan-ly');
        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('/','UserController@index')->name('user.index')->middleware('permission:danh-sach-nguoi-dung|toan-quyen-quan-ly');
            Route::get('/create','UserController@create')->name('user.create')->middleware('permission:them-moi-nguoi-dung|toan-quyen-quan-ly');
            Route::post('/create','UserController@store');

            Route::get('/update/{id}','UserController@edit')->name('user.update')->middleware('permission:chinh-sua-nguoi-dung|toan-quyen-quan-ly');
            Route::post('/update/{id}','UserController@update');

            Route::get('/delete/{id}','UserController@delete')->name('user.delete')->middleware('permission:xoa-nguoi-dung|toan-quyen-quan-ly');
        });

        Route::group(['prefix' => 'resident'], function(){
            Route::get('/','TrooperController@index')->name('trooper.index')->middleware('permission:danh-sach-cu-dan|toan-quyen-quan-ly');
            Route::get('/create','TrooperController@create')->name('trooper.create')->middleware('permission:them-moi-cu-dan|toan-quyen-quan-ly');
            Route::post('/create','TrooperController@store');

            Route::get('/update/{id}','TrooperController@edit')->name('trooper.update')->middleware('permission:chinh-sua-cu-dan|toan-quyen-quan-ly');
            Route::post('/update/{id}','TrooperController@update');

            Route::get('/delete/{id}','TrooperController@delete')->name('trooper.delete')->middleware('permission:xoa-cu-dan|toan-quyen-quan-ly');

            Route::post('/preview/trooper/{id}','TrooperController@previewTrooper')->name('preview.trooper');

            Route::get('/print','TrooperController@userInForPrint')->name('trooper.print');

            Route::get('/search','SearchController@search')->name('trooper.search');
        });

        Route::group(['prefix' => 'category'], function(){
            Route::get('/','CategoryController@index')->name('category.index')->middleware('permission:danh-sach-loai-ho-gia-dinh|toan-quyen-quan-ly');
            Route::get('/create','CategoryController@create')->name('category.create')->middleware('permission:them-moi-loai-ho-gia-dinh|toan-quyen-quan-ly');
            Route::post('/create','CategoryController@store');

            Route::get('/update/{id}','CategoryController@edit')->name('category.update')->middleware('permission:chinh-sua-loai-ho-gia-dinh|toan-quyen-quan-ly');
            Route::post('/update/{id}','CategoryController@update');

            Route::get('/delete/{id}','CategoryController@destroy')->name('category.delete')->middleware('permission:xoa-loai-ho-gia-dinh|toan-quyen-quan-ly');
        });

        Route::group(['prefix' => 'family'], function(){
            Route::get('/','FamilyController@index')->name('family.index')->middleware('permission:danh-sach-ho-gia-dinh|toan-quyen-quan-ly');
            Route::get('/create','FamilyController@create')->name('family.create')->middleware('permission:them-moi-ho-gia-dinh|toan-quyen-quan-ly');
            Route::post('/create','FamilyController@store');

            Route::get('/update/{id}','FamilyController@edit')->name('family.update')->middleware('permission:chinh-sua-ho-gia-dinh|toan-quyen-quan-ly');
            Route::post('/update/{id}','FamilyController@update');

            Route::get('/delete/{id}','FamilyController@destroy')->name('family.delete')->middleware('permission:xoa-ho-gia-dinh|toan-quyen-quan-ly');
            Route::get('/preview/{id}','FamilyController@show')->name('family.preview');
        });

        Route::group(['prefix' => 'insurance-card'], function(){
            Route::get('/','InsuranceCardController@index')->name('insurance.card.index');
            Route::get('/create','InsuranceCardController@create')->name('insurance.card.create');
            Route::post('/create','InsuranceCardController@store');

            Route::get('/update/{id}','InsuranceCardController@edit')->name('insurance.card.update');
            Route::post('/update/{id}','InsuranceCardController@update');

            Route::get('/delete/{id}','InsuranceCardController@destroy')->name('insurance.card.delete');
        });

        Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
            Route::get('/reset/password','ResetPasswordController@showResetForm')->name('auth.reset.password');
            Route::post('/reset/password','ResetPasswordController@postResetPassword')->name('post.auth.reset.password');
        });
    });
});

Route::group(['namespace' => 'Page', 'middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'ChangeLanguageController@changeLanguage')->name('user.change-language');
});


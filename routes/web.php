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

Route::get('/', function () {
    // Redirect to home ---> if has auth redirect to home or go to login page
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {

    //************************************************
    //                  البروفايل
    //************************************************
    // عرض صفحة البروفايل
    route::get('profile', 'ProfileController@profil')->name('profile');
    // تعديل بيانات الروفايل
    route::post('profile', 'ProfileController@profile_store')->name('profile.store');

    //************************************************
    //               الاعدادات العامة
    //************************************************
    // عرض صفحة الاعدادات
    route::get('setting', 'SettingController@setting')->name('setting');
    // تعديل  الاعدادات
    route::post('setting', 'SettingController@setting_store')->name('setting.store');

    //************************************************
    //               الاعدادات العامة
    //************************************************

    route::resource('pharmacy', 'PharmacyController')->middleware('admin');
    route::resource('clinic', 'ClinicController')->middleware('admin');
    route::resource('company', 'CompanyController')->middleware('admin');


    route::get('select', 'CompanyController@select')->name('company.select')->middleware('clinic');
    route::get('select/{id}', 'CompanyController@select_post')->name('company.select.post')->middleware('clinic');
    route::get('select/delete/{id}', 'CompanyController@select_delete_post')->name('company.select.delete.post')->middleware('clinic');
    route::resource('doctor', 'DoctorController')->middleware('clinic');



    route::get('report/pharmacy', 'ReportController@report_pharmacy')->name('report.pharmacy')->middleware('admin');
    route::get('report/clinic', 'ReportController@report_clinic')->name('report.clinic')->middleware('admin');
});

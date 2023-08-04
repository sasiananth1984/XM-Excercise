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
Route::get('/', 'App\Http\Controllers\CompanyFormController@createForm');
Route::get('/get-historical-data', 'App\Http\Controllers\YhFinanceController@getHistoricalData');

Route::get('/company', 'App\Http\Controllers\CompanyFormController@createForm');
Route::get('/chart', 'App\Http\Controllers\ChartController@index');
Route::post('/company', 'App\Http\Controllers\CompanyFormController@CompanyForm')->name('CompanyForm');;
?>
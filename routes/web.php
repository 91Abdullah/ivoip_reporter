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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/users/create', 'UserController@create')->name('form.user');
    Route::post('/users/create', 'UserController@create')->name('create.user');

    Route::get('/users/update/{user}', 'UserController@update')->name('edit.user');
    Route::patch('/users/create/{user}', 'UserController@update')->name('update.user');

    Route::delete('/users/delete/{user}', 'UserController@destroy')->name('delete.user');

    Route::get('/cdr_report', 'ReportController@getCdr')->name('cdr_report');
    Route::post('/cdr_report', 'ReportController@getCdr')->name('fetch_cdr');

    Route::get('/ready_report', 'ReportController@getReadyReport')->name('ready_report');
    Route::post('/ready_report', 'ReportController@getReadyReport')->name('fetch_ready');

    Route::get('/consolidated_report_1', 'ReportController@getConsolidatedReport_1')->name('consolidated_1_report');
    Route::post('/consolidated_report_1', 'ReportController@getConsolidatedReport_1')->name('fetch_consolidated_1');

    Route::get('/consolidated_report_2', 'ReportController@getConsolidatedReport_2')->name('consolidated_2_report');
    Route::post('/consolidated_report_2', 'ReportController@getConsolidatedReport_2')->name('fetch_consolidated_2');

    Route::get('/abondaned_report', 'ReportController@getAbondanedReport')->name('get_abondaned_report');
    Route::post('/abondaned_report', 'ReportController@getAbondanedReport')->name('fetch_abondaned_report');

    Route::get('/enterqueue_report', 'ReportController@getEnterqueueReport')->name('get_enterqueue_report');
    Route::post('/enterqueue_report', 'ReportController@getEnterqueueReport')->name('fetch_enterqueue_report');

    Route::get('/agentconnect_report', 'ReportController@getAgentconnectReport')->name('get_agentconnect_report');
    Route::post('/agentconnect_report', 'ReportController@getAgentconnectReport')->name('fetch_agentconnect_report');
}); 

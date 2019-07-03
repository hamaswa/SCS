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

//Route::group(['middleware' => 'auth'], function() {
//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/aa', 'ApplicationAccountController');
Route::resource('/aafields', 'AASourceController');
Route::post('/aadata/create', 'ApplicantDataController@create');
Route::resource('/aadata', 'ApplicantDataController');
Route::resource('/pipeline', 'PipelineController');
Route::resource('/applicantkyc', 'ApplicantDataController');
Route::resource('/incomekyc', 'IncomekycController');
Route::resource('/wealthkyc', 'WealthkycController');
Route::resource('/propertykyc', 'PropertykycController');
Route::get('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
Route::post('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
Route::resource('/orders', 'OrderController');
Route::resource('/users', 'Auth\RegisterController');
//Route::post('/housingloan/create', 'HousingLoanController@create');
Route::resource('/housingloan', 'HousingLoanController');
Route::resource('/termloan', 'TermLoanController');
Route::resource('/creditcard', 'CreditCardController');
Route::resource('/hirepurchase', 'HirePurchaseController');
Route::resource('/overdraft', 'OverDraftController');
Route::resource('/personalloan', 'PersonalLoanController');
Route::resource('/departments', 'DepartmentController');
Route::get("/users/{id}/departments", 'UserController@departments')->name("users.departments");
Route::get("data/de", 'DataEntryController@de');
//});

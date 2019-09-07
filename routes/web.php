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
    return view('admin.auth.login');
});



Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes([
        'register' => false,
    ]);


Route::group(['prefix'=>'admin','auth'], function() {

    Route::resource('/permissions', 'Admin\PermissionController');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name("register.create");
    Route::post('/register', 'Auth\RegisterController@register')->name("register.store");
    Route::post('/register/{id}', 'Auth\RegisterController@update')->name("register.update");
    Route::get("/users/details/{id}",'Admin\UserController@getUserDetail')->name("user.details");
    Route::get("/users/contacts/{id}",'Admin\UserController@getUserContacts');
    Route::resource("/users/contacts",'Admin\UserContactsController');
    Route::resource('/users', 'Auth\RegisterController');


    Route::get('/users/income_type', function () {
        return view('admin.users.income_type');
    });
    Route::get('/users/payments', function () {
        return view('admin.users.payments');
    });

});


Route::group(['middleware' => 'role:maker'], function() {

    Route::post("/maker/search",'Maker\MakerController@search')->name("maker.search");
    Route::get("/maker/newla/{id}",'Maker\MakerController@newla')->name("maker.newla");
    Route::post("/maker/storela",'Maker\MakerController@storela')->name("maker.storela");
    Route::resource('maker', 'Maker\MakerController');
    Route::resource('/la', 'LoanApplicationController');
    Route::post('/maker/la', 'LoanApplicationController@showAttachAA')->name("showAttachAA");
    Route::post('/maker/attachIndAA', 'LoanApplicationController@attachIndAA')->name("attachIndAA");
    Route::post('/maker/attachIndAASearch', 'LoanApplicationController@attachIndAASearch')->name("attachIndAASearch");
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'ApplicantDataController@index')->name('home');
    Route::resource('/aa', 'ApplicationAccountController');

    Route::post('/deleteIndAA',"LoanApplicationController@deleteIndAA")->name("deleteIndAA");
    Route::resource('/aafields', 'AASourceController');
    Route::post('/aadata/create', 'ApplicantDataController@create');
    Route::resource('/aadata', 'ApplicantDataController');
    Route::resource('/applicantcomments', 'ApplicantCommentsController');
    Route::post('/applicantcomments/comments', 'ApplicantCommentsController@index')->name("comments");
    Route::resource('/pipeline', 'PipelineController');
    Route::resource('/applicantkyc', 'ApplicantDataController');
    Route::resource('/businesskyc', 'BusinesskycController');
    Route::post('/incomekyc/incomedata', 'IncomekycController@index')->name("incomedata");
    Route::resource('/incomekyc', 'IncomekycController');
    Route::post('/wealthkyc/wealthdata', 'WealthkycController@index')->name("wealthdata");
    Route::resource('/wealthkyc', 'WealthkycController');
    Route::post('/documents', 'ApplicantDocumentsController@documents')->name("documents");
    Route::Resource('/applicant/documents', 'ApplicantDocumentsController');
    Route::post('/propertykyc/propertydata', 'PropertykycController@index')->name("propertydata");
    Route::resource('/propertykyc', 'PropertykycController');
    Route::get('/download', 'ApplicantDocumentsController@download')->name("download");
    Route::get('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
    Route::post('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
    Route::resource('/orders', 'OrderController');
//Route::post('/housingloan/create', 'HousingLoanController@create');
    Route::resource('/housingloan', 'HousingLoanController');
    Route::resource('/termloan', 'TermLoanController');
    Route::resource('/creditcard', 'CreditCardController');
    Route::resource('/hirepurchase', 'HirePurchaseController');
    Route::resource('/overdraft', 'OverDraftController');
    Route::resource('/personalloan', 'PersonalLoanController');
    Route::resource('/departments', 'DepartmentController');
    Route::get("/members", "MembersController@getMembers")->name("members.index");
    Route::get("/users/{id}/departments", 'Admin\UserController@departments')->name("users.departments");
    Route::get("data/de", 'DataEntryController@de');
});

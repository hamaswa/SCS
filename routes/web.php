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

Route::group(['middleware' => 'role:uploader'], function () {
    Route::resource('checker', 'Checker\CheckerController');
    Route::post("/checker/request", "Checker\CheckerController@requestLa")->name("checker.request");
    Route::post("/checker/work_in_progress", "Checker\CheckerController@workInProgress")->name("checker.workinprogress");

});

Route::group(['middleware' => 'role:uploader'], function() {
    Route::resource('/uploader/la', 'Uploader\LaController', ['names' => 'uploader_la']);
    Route::resource('uploader', 'Uploader\UploaderController');
    Route::post('/uploader/existing_commitment', 'Uploader\UploaderController@existingCommitment')->name("existing_commitment");
    Route::post('/uploader/new_commitment', 'Uploader\UploaderController@newCommitment')->name("new_commitment");
    Route::post('/uploader/new_facility', 'Uploader\UploaderController@newFacility')->name("new_facility");
    Route::post('/uploader/la_properties','Uploader\UploaderController@laProperties')->name('la_properties');
    Route::post('/uploader/attach_property','Uploader\UploaderController@attachProperty')->name('attach_property');
    Route::post('/uploader/la_facilities','Uploader\UploaderController@laFacilities')->name('la_facilities');
    Route::post('/uploader/add_new_facility','Uploader\UploaderController@storeNewFacility')->name('add_new_facility');
    Route::post('/uploader/delete_facility','Uploader\UploaderController@deleteFacility')->name('delete_facility');
    Route::post('/uploader/cover_facility','Uploader\UploaderController@coverFacility')->name('cover_facility');
    Route::post('/uploader/facility_edit','Uploader\UploaderController@facilityEdit')->name('facility_edit');
    Route::post('/uploader/select_applicant','Uploader\UploaderController@SelectApplicant')->name('select_applicant');
    Route::post('/uploader/dst_projection', "Uploader\UploaderController@dsrProjection")->name("dsr_projection");
    Route::post("/uploader/openla", "Uploader\UploaderController@statusOpen")->name("applicant.status_open");
});

Route::group(['middleware' => 'role:maker'], function() {
    Route::post("/maker/status_inprogress", 'Maker\MakerController@statusInprogress')->name("maker.inprogress");
    Route::post("/maker/search",'Maker\MakerController@search')->name("maker.search");
    Route::get("/maker/newla/{id}",'Maker\MakerController@newla')->name("maker.newla");
    Route::get("/maker/create_aa/{id}",'Maker\MakerController@create_aa')->name("maker.create_aa");
    Route::post("/maker/storela",'Maker\MakerController@storela')->name("maker.storela");
    Route::get('maker/new_aa', 'Maker\MakerController@newAA')->name("new_aa");
    Route::post('maker/store_new_aa', 'Maker\MakerController@storeNewAA')->name("store_new_aa");
    Route::resource('maker', 'Maker\MakerController');
    Route::resource('maker/la', 'LoanApplicationController', [ 'names' => 'la' ]);
    Route::post('/sub_la', 'LoanApplicationController@showAttachAA')->name("showAttachAA");
    Route::post('/maker/comIndAA', 'LoanApplicationController@comIndAA')->name("comIndAA");
    Route::post('/maker/attachAA', 'LoanApplicationController@attachAA')->name("attachAA");
    Route::post('/maker/attachAASearch', 'LoanApplicationController@attachAASearch')->name("attachAASearch");
    Route::post('/maker/attachComAA', 'LoanApplicationController@attachComAA')->name("attachComAA");
    Route::post('/maker/attachComAASearch', 'LoanApplicationController@attachComAASearch')->name("attachComAASearch");
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'ApplicantDataController@index')->name('home');
    Route::resource('/aa', 'ApplicationAccountController');

    Route::post('/deleteAA',"LoanApplicationController@deleteAA")->name("deleteAA");
    Route::post('/selectoptions','AASourceController@selectoptions')->name("selectoptions");
    Route::resource('/aafields', 'AASourceController');
    Route::post('/aadata/create', 'ApplicantDataController@create');
    Route::post('/aadata/storeAA', 'ApplicantDataController@storeAA')->name("aadata.storeAA");
    Route::resource('/aadata', 'ApplicantDataController');
    Route::resource('/applicantcomments', 'ApplicantCommentsController');
    Route::post('/applicantcomments/comments', 'ApplicantCommentsController@index')->name("comments");
    Route::resource('/pipeline', 'PipelineController');
    Route::post('/applicantkyc/applicantsidebar', 'ApplicantDataController@applicantSidebar')->name("applicant_sidebar");
    Route::resource('/applicantkyc', 'ApplicantDataController');
    Route::resource('/businesskyc', 'BusinesskycController');
    Route::post("/businesskyc/storeIncomeSource",'BusinesskycController@storeIncomeSource')->name("bussiness.storeIncomeSource");
    Route::post("/businesskyc/delete/",'BusinesskycController@deleteIncomeSource')->name("bussiness.delete");
    Route::get("/incomekyc/action_btns","IncomekycController@actionbtns")->name("incomekyc.incomekyc_action_btns");
    //Route::post('/incomekyc/incomedata', 'IncomekycController@index')->name("incomedata");
    //Route::post('/applicantkyc/applicantsidebar', 'ApplicantDataController@applicantSidebar')->name("applicant_sidebar");
    Route::resource('/incomekyc', 'IncomekycController');

    Route::get("/wealthkyc/action_btns","WealthkycController@actionbtns")->name("wealthkyc.wealthkyc_action_btns");
   // Route::post('/wealthkyc/wealthdata', 'WealthkycController@index')->name("wealthdata");
    Route::resource('/wealthkyc', 'WealthkycController');
    Route::post('/documents', 'ApplicantDocumentsController@documents')->name("documents");
    Route::Resource('/applicant/documents', 'ApplicantDocumentsController');
    Route::post('/propertykyc/propertydata', 'PropertykycController@index')->name("propertydata");
    Route::resource('/propertykyc', 'PropertykycController');
    Route::get('/download', 'ApplicantDocumentsController@download')->name("download");
    Route::get('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
    Route::post('/downloadpdf', 'PipelineController@downloadpdf')->name("downloadpdf");
    Route::resource('/orders', 'OrderController');

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

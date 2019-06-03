<?php

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
//$this->post('login', 'Auth\LoginController@login')->name('auth.login');
//$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
//Route::get('login', 'Auth\LoginController@login')->name('login');
//Route::post('login','Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

  
//  Ajax Routes
Route::post('getConsultancyqueuedata', array('as' => 'getConsultancyqueuedata', 'uses' => 'HomeController@getConsultancyqueuedata'));
Route::post('getAddPatientResult', array('as' => 'getAddPatientResult', 'uses' => 'HomeController@getAddPatientResult'));
Route::post('getAddPatientResultdata', array('as' => 'getAddPatientResultdata', 'uses' => 'HomeController@getAddPatientResultdata'));
Route::post('saveNewPatient', array('as' => 'saveNewPatient', 'uses' => 'HomeController@saveNewPatient'));
Route::post('getExistingCompany', array('as' => 'getExistingCompany', 'uses' => 'HomeController@getExistingCompany'));
Route::post('savenewty2', array('as' => 'savenewty2', 'uses' => 'HomeController@savenewty2'));

Route::get('patientprofile/{id}', array('as' => 'patientprofilepath', 'uses' => 'PatientController@profile'));
Route::post('savePrescription', array('as' => 'savePrescription', 'uses' => 'PatientController@savePrescription'));
Route::get('savePrescription', array('as' => 'getPrescription', 'uses' => 'PatientController@getPrescription'));
Route::post('saveLaboratorytest', array('as' => 'saveLaboratorytest', 'uses' => 'LaboratoryController@saveLaboratorytest'));
Route::post('laboratoryrequest', array('as' => 'laboratoryrequest', 'uses' => 'PatientController@laboratoryrequest'));

Route::get('labpatientprofile/{id}', array('as' => 'labpatientprofile', 'uses' => 'PatientController@labpatientprofile'));

Route::post('laboratoryPassForm', array('as' => 'laboratoryPassForm', 'uses' => 'PatientController@laboratoryPassForm'));
Route::post('consultancyPassForm', array('as' => 'consultancyPassForm', 'uses' => 'PatientController@consultancyPassForm'));

 



Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::resource('consultations', 'ConsultationController');
    Route::resource('laboratory', 'LaboratoryController');
    Route::resource('registrations', 'RegistrationController');
    Route::resource('dispensary', 'DispensaryController');
    Route::resource('inventory', 'InventoryController');
    Route::resource('ty2', 'Ty2Controller');
    Route::resource('reports', 'ReportController');
});

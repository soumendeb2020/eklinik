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
Route::post('getAddPatientResult', array('as' => 'getAddPatientResult', 'uses' => 'HomeController@getAddPatientResult'));
Route::post('getAddPatientResultdata', array('as' => 'getAddPatientResultdata', 'uses' => 'HomeController@getAddPatientResultdata'));
Route::post('saveNewPatient', array('as' => 'saveNewPatient', 'uses' => 'HomeController@saveNewPatient'));
Route::post('getExistingCompany', array('as' => 'getExistingCompany', 'uses' => 'HomeController@getExistingCompany'));
Route::post('savenewty2', array('as' => 'savenewty2', 'uses' => 'HomeController@savenewty2'));

Route::get('patientprofile', array('as' => 'patientprofilepath', 'uses' => 'PatientController@profile'));



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

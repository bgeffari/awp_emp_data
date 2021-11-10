<?php

Route::view('/', 'auth.login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Main Certificate Type
    Route::delete('main-certificate-types/destroy', 'MainCertificateTypeController@massDestroy')->name('main-certificate-types.massDestroy');
    Route::resource('main-certificate-types', 'MainCertificateTypeController');

    // Sub Certificate Types
    Route::delete('sub-certificate-types/destroy', 'SubCertificateTypesController@massDestroy')->name('sub-certificate-types.massDestroy');
    Route::resource('sub-certificate-types', 'SubCertificateTypesController');

    // Major
    Route::delete('majors/destroy', 'MajorController@massDestroy')->name('majors.massDestroy');
    Route::resource('majors', 'MajorController');

    // Academic Facility
    Route::delete('academic-facilities/destroy', 'AcademicFacilityController@massDestroy')->name('academic-facilities.massDestroy');
    Route::resource('academic-facilities', 'AcademicFacilityController');

    // Awp Emp Data
    Route::delete('awp-emp-datas/destroy', 'AwpEmpDataController@massDestroy')->name('awp-emp-datas.massDestroy');
    Route::post('awp-emp-datas/media', 'AwpEmpDataController@storeMedia')->name('awp-emp-datas.storeMedia');
    Route::post('awp-emp-datas/ckmedia', 'AwpEmpDataController@storeCKEditorImages')->name('awp-emp-datas.storeCKEditorImages');
    Route::resource('awp-emp-datas', 'AwpEmpDataController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Main Certificate Type
    Route::delete('main-certificate-types/destroy', 'MainCertificateTypeController@massDestroy')->name('main-certificate-types.massDestroy');
    Route::resource('main-certificate-types', 'MainCertificateTypeController');

    // Sub Certificate Types
    Route::get('sub-certificate-types/get_by_main_certificate_type', 'SubCertificateTypesController@get_by_main_certificate_type')->name('sub-certificate-types.get_by_main_certificate_type');
    Route::delete('sub-certificate-types/destroy', 'SubCertificateTypesController@massDestroy')->name('sub-certificate-types.massDestroy');
    Route::resource('sub-certificate-types', 'SubCertificateTypesController');
    
    // Major
    Route::get('majors/get_by_sub_certificate_type', 'MajorController@get_by_sub_certificate_type')->name('majors.get_by_sub_certificate_type');
    Route::delete('majors/destroy', 'MajorController@massDestroy')->name('majors.massDestroy');
    Route::resource('majors', 'MajorController');

    // Academic Facility
    Route::get('academic-facilities/get_by_main_certificate_type', 'AcademicFacilityController@get_by_main_certificate_type')->name('academic-facilities.get_by_main_certificate_type');
    Route::delete('academic-facilities/destroy', 'AcademicFacilityController@massDestroy')->name('academic-facilities.massDestroy');
    Route::resource('academic-facilities', 'AcademicFacilityController');
    
    // Awp Emp Data
    Route::delete('awp-emp-datas/destroy', 'AwpEmpDataController@massDestroy')->name('awp-emp-datas.massDestroy');
    Route::post('awp-emp-datas/media', 'AwpEmpDataController@storeMedia')->name('awp-emp-datas.storeMedia');
    Route::post('awp-emp-datas/ckmedia', 'AwpEmpDataController@storeCKEditorImages')->name('awp-emp-datas.storeCKEditorImages');
    Route::resource('awp-emp-datas', 'AwpEmpDataController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});

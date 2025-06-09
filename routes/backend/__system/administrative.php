<?php


// ADMINISTRATIVE APPLICATIONS - CUSTOMIZATIONS
Route::get('/dashboard/administratives/applications/customizations', [App\Http\Controllers\Backend\__System\Administrative\Application\CustomizationController::class, 'index'])->name('dashboard.administrative.application.customization.index');
Route::patch('/dashboard/administratives/applications/customizations/update/{id}', [App\Http\Controllers\Backend\__System\Administrative\Application\CustomizationController::class, 'update'])->name('dashboard.administrative.customization.application.update');

// ADMINISTRATIVE APPLICATIONS - OPTIMIZATIONS
Route::group([
  'as' => 'dashboard.system.administrative.application.optimizations.',
  'prefix' => 'dashboard/administratives/applications/optimizations',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Application',
  'middleware' => 'auth',
], function () {
  Route::get('start-optimizing/{id}', 'OptimizationController@start_optimizing')->name('start-optimizing');
  Route::get('/', 'OptimizationController@index');
});

// ADMINISTRATIVE APPLICATIONS - SETTINGS
Route::get('/dashboard/administratives/applications/settings', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'index'])->name('dashboard.administrative.application.setting.index');
Route::patch('/dashboard/administratives/applications/settings/update/{id}', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'update'])->name('dashboard.administrative.application.setting.update');


// ADMINISTRATIVE - MANAGEMENT USERS
Route::group([
  'as' => 'dashboard.system.administrative.management.users.',
  'prefix' => 'dashboard/administratives/managements/users',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'UserController@active')->name('active');
  Route::get('activities', 'UserController@activity')->name('activity');
  Route::get('inactive/{id}', 'UserController@inactive')->name('inactive');
  Route::get('delete/{id}', 'UserController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'UserController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'UserController@restore')->name('restore');
  Route::get('trash', 'UserController@trash')->name('trash');
  Route::get('selected-active', 'UserController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'UserController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'UserController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'UserController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'UserController@selected_restore')->name('selected-restore');
  Route::resource('/', 'UserController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - MANAGEMENT ROLES
Route::group([
  'as' => 'dashboard.system.administrative.management.roles.',
  'prefix' => 'dashboard/administratives/managements/roles',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'RoleController@active')->name('active');
  Route::get('activities', 'RoleController@activity')->name('activity');
  Route::get('inactive/{id}', 'RoleController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RoleController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'RoleController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'RoleController@restore')->name('restore');
  Route::get('trash', 'RoleController@trash')->name('trash');
  Route::get('selected-active', 'RoleController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'RoleController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'RoleController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'RoleController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'RoleController@selected_restore')->name('selected-restore');
  Route::resource('/', 'RoleController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - SESSIONS
Route::group([
  'as' => 'dashboard.system.administrative.sessions.',
  'prefix' => 'dashboard/administratives/sessions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative',
  'middleware' => 'auth',
], function () {
  Route::get('reset', 'SessionController@reset')->name('reset');
  Route::get('/', 'SessionController@index');
});

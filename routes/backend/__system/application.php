<?php

// DATATABLES - GENERALS
Route::group([
  'as' => 'dashboard.system.application.datatable.generals.',
  'prefix' => 'dashboard/applications/datatables/generals',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Datatable',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::get('selected-active', 'GeneralController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'GeneralController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'GeneralController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'GeneralController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'GeneralController@selected_restore')->name('selected-restore');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// DATATABLES - RELATIONS
Route::group([
  'as' => 'dashboard.system.application.datatable.relations.',
  'prefix' => 'dashboard/applications/datatables/relations',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Datatable',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('active/{id}', 'RelationController@active')->name('active');
  Route::get('activities', 'RelationController@activity')->name('activity');
  Route::get('inactive/{id}', 'RelationController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RelationController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'RelationController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'RelationController@restore')->name('restore');
  Route::get('trash', 'RelationController@trash')->name('trash');
  Route::get('selected-active', 'RelationController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'RelationController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'RelationController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'RelationController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'RelationController@selected_restore')->name('selected-restore');
  Route::resource('/', 'RelationController')->parameters(['' => 'id']);
});

// MONITORINGS
Route::group([
  'as' => 'dashboard.system.application.monitorings.',
  'prefix' => 'dashboard/applications/monitorings',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('active/{id}', 'MonitoringController@active')->name('active');
  Route::get('activities', 'MonitoringController@activity')->name('activity');
  Route::get('inactive/{id}', 'MonitoringController@inactive')->name('inactive');
  Route::get('delete/{id}', 'MonitoringController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'MonitoringController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'MonitoringController@restore')->name('restore');
  Route::get('trash', 'MonitoringController@trash')->name('trash');
  Route::get('selected-active', 'MonitoringController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'MonitoringController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'MonitoringController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'MonitoringController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'MonitoringController@selected_restore')->name('selected-restore');
  Route::resource('/', 'MonitoringController')->parameters(['' => 'id']);
});

// SHEETS
Route::group([
  'as' => 'dashboard.system.application.sheets.',
  'prefix' => 'dashboard/applications/sheets',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('synchronization', 'SheetController@synchronization')->name('synchronization');
  Route::get('/', 'SheetController@index')->name('index');
});

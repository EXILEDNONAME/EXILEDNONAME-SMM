<?php

Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');
Route::get('/dashboard/language/{language}', [App\Http\Controllers\Backend\DashboardController::class, 'language'])->name('language');
Route::get('/dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');

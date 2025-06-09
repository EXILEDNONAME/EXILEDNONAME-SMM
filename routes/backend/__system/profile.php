<?php

Route::get('/dashboard/settings/profiles', function () { return redirect('/dashboard/settings/profiles/account-informations'); });
Route::get('/dashboard/settings/profiles/account-informations', [App\Http\Controllers\Backend\__System\Setting\ProfileController::class, 'account_information'])->name('dashboard.setting.profile.account-information');
Route::patch('/dashboard/settings/profiles/account-informations/update/{id}', [App\Http\Controllers\Backend\__System\Setting\ProfileController::class, 'account_information_update'])->name('dashboard.setting.profile.account-information-update');
Route::get('/dashboard/settings/profiles/change-password', [App\Http\Controllers\Backend\__System\Setting\ProfileController::class, 'change_password'])->name('dashboard.setting.profile.change-password');
Route::post('/dashboard/settings/profiles/update-password', [App\Http\Controllers\Backend\__System\Setting\ProfileController::class, 'update_password'])->name('dashboard.setting.profile.update-password');

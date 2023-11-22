<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[SettingsController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'settings',
    App\Modules\Settings\Backend\Controllers\SettingsController::class,
    [
        'names' => [
            'edit' => 'admin.settings.edit',
            'index' => 'admin.settings.index',
            'create' => 'admin.settings.create',
            'store' => 'admin.settings.store',
            'destroy' => 'admin.settings.destroy',
            'update' => 'admin.settings.update',
        ]
    ]
);
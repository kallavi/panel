<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[SettingController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'setting',
    App\Modules\Setting\Backend\Controllers\SettingController::class,
    [
        'names' => [
            'edit' => 'admin.setting.edit',
            'index' => 'admin.setting.index',
            'create' => 'admin.setting.create',
            'store' => 'admin.setting.store',
            'destroy' => 'admin.setting.destroy',
            'update' => 'admin.setting.update',
        ]
    ]
);
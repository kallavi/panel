<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[ServiceController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'service',
    App\Modules\Service\Backend\Controllers\ServiceController::class,
    [
        'names' => [
            'edit' => 'admin.service.edit',
            'index' => 'admin.service.index',
            'create' => 'admin.service.create',
            'store' => 'admin.service.store',
            'destroy' => 'admin.service.destroy',
            'update' => 'admin.service.update',
        ]
    ]
);
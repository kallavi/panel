<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[ActivityController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'activity',
    App\Modules\Activity\Backend\Controllers\ActivityController::class,
    [
        'names' => [
            'edit' => 'admin.activity.edit',
            'index' => 'admin.activity.index',
            'create' => 'admin.activity.create',
            'store' => 'admin.activity.store',
            'destroy' => 'admin.activity.destroy',
            'update' => 'admin.activity.update',
        ]
    ]
);
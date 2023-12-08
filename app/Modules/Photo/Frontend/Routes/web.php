<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[PhotoController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'photo',
    App\Modules\Photo\Backend\Controllers\PhotoController::class,
    [
        'names' => [
            'edit' => 'admin.photo.edit',
            'index' => 'admin.photo.index',
            'create' => 'admin.photo.create',
            'store' => 'admin.photo.store',
            'destroy' => 'admin.photo.destroy',
            'update' => 'admin.photo.update',
        ]
    ]
);
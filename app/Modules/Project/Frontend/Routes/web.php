<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[ProjectController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'project',
    App\Modules\Project\Backend\Controllers\ProjectController::class,
    [
        'names' => [
            'edit' => 'admin.project.edit',
            'index' => 'admin.project.index',
            'create' => 'admin.project.create',
            'store' => 'admin.project.store',
            'destroy' => 'admin.project.destroy',
            'update' => 'admin.project.update',
        ]
    ]
);
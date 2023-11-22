<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[SlugController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'slug',
    App\Modules\Slug\Backend\Controllers\SlugController::class,
    [
        'names' => [
            'edit' => 'admin.slug.edit',
            'index' => 'admin.slug.index',
            'create' => 'admin.slug.create',
            'store' => 'admin.slug.store',
            'destroy' => 'admin.slug.destroy',
            'update' => 'admin.slug.update',
        ]
    ]
);
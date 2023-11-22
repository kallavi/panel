<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[SliderController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'slider',
    App\Modules\Slider\Backend\Controllers\SliderController::class,
    [
        'names' => [
            'edit' => 'admin.slider.edit',
            'index' => 'admin.slider.index',
            'create' => 'admin.slider.create',
            'store' => 'admin.slider.store',
            'destroy' => 'admin.slider.destroy',
            'update' => 'admin.slider.update',
        ]
    ]
);
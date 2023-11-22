<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[MenuController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'menu',
    App\Modules\Menu\Backend\Controllers\MenuController::class,
    [
        'names' => [
            'edit' => 'admin.menu.edit',
            'index' => 'admin.menu.index',
            'create' => 'admin.menu.create',
            'store' => 'admin.menu.store',
            'destroy' => 'admin.menu.destroy',
            'update' => 'admin.menu.update',
        ]
    ]
);
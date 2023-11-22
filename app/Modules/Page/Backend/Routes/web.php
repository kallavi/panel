<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[PageController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'page',
    App\Modules\Page\Backend\Controllers\PageController::class,
    [
        'names' => [
            'edit' => 'admin.page.edit',
            'index' => 'admin.page.index',
            'create' => 'admin.page.create',
            'store' => 'admin.page.store',
            'destroy' => 'admin.page.destroy',
            'update' => 'admin.page.update',
        ]
    ]
);

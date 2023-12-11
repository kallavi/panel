<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[PortfolioController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'portfolio',
    App\Modules\Portfolio\Backend\Controllers\PortfolioController::class,
    [
        'names' => [
            'edit' => 'admin.portfolio.edit',
            'index' => 'admin.portfolio.index',
            'create' => 'admin.portfolio.create',
            'store' => 'admin.portfolio.store',
            'destroy' => 'admin.portfolio.destroy',
            'update' => 'admin.portfolio.update',
        ]
    ]
);
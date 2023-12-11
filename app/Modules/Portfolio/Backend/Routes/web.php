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
Route::resource(
    env('ADMIN_PREFIX') . '/' . 'portfoliocategory',
    \App\Modules\Portfolio\Backend\Controllers\CategoryController::class,
    [
        'names' => [
            'edit' => 'admin.portfoliocategory.edit',
            'index' => 'admin.portfoliocategory.index',
            'create' => 'admin.portfoliocategory.create',
            'store' => 'admin.portfoliocategory.store',
            'destroy' => 'admin.portfoliocategory.destroy',
            'update' => 'admin.portfoliocategory.update'
        ],
    ]
);
Route::post('/portfolio-gallery-delete', [PortfolioController::class, 'galleryDelete'])->name('portfolioGallery.delete');
Route::post('/portfolio-document-delete', [PortfolioController::class, 'documentDelete'])->name('portfolioDocument.delete');

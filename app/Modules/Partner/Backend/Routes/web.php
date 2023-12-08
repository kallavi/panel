<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => '{{modulePrefix}}'], function () {
//    // Define module-specific routes here
//    Route::get('/',[PartnerController::class,'index'])->name('{{modulePrefix}}.index');
//});


Route::resource(
    env('ADMIN_PREFIX') . '/' . 'partner',
    App\Modules\Partner\Backend\Controllers\PartnerController::class,
    [
        'names' => [
            'edit' => 'admin.partner.edit',
            'index' => 'admin.partner.index',
            'create' => 'admin.partner.create',
            'store' => 'admin.partner.store',
            'destroy' => 'admin.partner.destroy',
            'update' => 'admin.partner.update',
        ]
    ]
);

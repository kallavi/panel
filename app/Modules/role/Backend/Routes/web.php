<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{{modulePrefix}}'], function () {
    // Define module-specific routes here
    Route::get('/',[App\Modules\role\Backend\Controller::class,'index'])->name('{{modulePrefix}}.index');
});
 
 
Route::resource(
    env('ADMIN_PREFIX') . '/' . 'role',
    App\Modules\role\Backend\Controllers\RoleController::class,
    [
        'names' => [
            'edit' => 'admin.role.edit',
            'index' => 'admin.role.index',
            'create' => 'admin.role.create',
            'store' => 'admin.role.store',
            'destroy' => 'admin.role.destroy',
            'update' => 'admin.role.update',
        ]
    ]
);

Route::get(env('ADMIN_PREFIX') . '/' . 'role/delete/{id}', [App\Modules\role\Backend\Controllers\RoleController::class, 'delete'])->name('admin.role.delete');

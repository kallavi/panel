<?php

use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => '{{modulePrefix}}'], function () {
//     // Define module-specific routes here
//     Route::get('/',[App\Modules\users\Backend\Controller::class,'index'])->name('{{modulePrefix}}.index');
// });

Route::resource(
    env('ADMIN_PREFIX').'/' . 'users',
    App\Modules\users\Backend\Controllers\UsersController::class,
    [
        'names' => [
            'edit' => 'admin.users.edit',
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'destroy' => 'admin.users.destroy',
            'update' => 'admin.users.update',
        ]
    ]
);
Route::get( env('ADMIN_PREFIX').'/' . 'users/delete/{id}', [App\Modules\users\Backend\Controllers\UsersController::class, 'delete'])->name('admin.users.delete');

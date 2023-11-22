<?php

use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['can:kullanici']],
    function () {

        Route::resource(
            env('ADMIN_PREFIX') . '/' . 'permission',
            App\Modules\permission\Backend\Controllers\PermissionController::class,
            [
                'names' => [
                    'edit' => 'admin.permission.edit',
                    'index' => 'admin.permission.index',
                    'create' => 'admin.permission.create',
                    'store' => 'admin.permission.store',
                    'destroy' => 'admin.permission.destroy',
                    'update' => 'admin.permission.update',
                ]
            ]
        );
        Route::get(env('ADMIN_PREFIX') . '/' . 'permission/delete/{id}', [App\Modules\permission\Backend\Controllers\PermissionController::class, 'delete'])->name('admin.permission.delete');
    }
);

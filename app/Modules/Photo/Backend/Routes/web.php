<?php

use Illuminate\Support\Facades\Route;

Route::resource(
    env('ADMIN_PREFIX') . '/' . 'photo',
    App\Modules\Photo\Backend\Controllers\PhotoController::class,
    [
        'names' => [
            'edit' => 'admin.photo.edit',
            'index' => 'admin.photo.index',
            'create' => 'admin.photo.create',
            'store' => 'admin.photo.store',
            'destroy' => 'admin.photo.destroy',
            'update' => 'admin.photo.update',
        ]
    ]
);
Route::post(env('ADMIN_PREFIX') . '/photo/upload', [App\Modules\Photo\Backend\Controllers\PhotoController::class, 'upload'])->name('admin.photo.upload');

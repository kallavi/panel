<?php

use App\Modules\Blog\Backend\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix(env('ADMIN_PREFIX'))->middleware(\App\Http\Middleware\BackofficeMiddleware::class)->group(
    function () {
        Route::resource(
            'blogs',
            \App\Modules\Blog\Backend\Controllers\BlogController::class,
            [
                'names' => [
                    'edit' => 'admin.blogs.edit',
                    'index' => 'admin.blogs.index',
                    'create' => 'admin.blogs.create',
                    'store' => 'admin.blogs.store',
                    'destroy' => 'admin.blogs.destroy',
                    'update' => 'admin.blogs.update'
                ],
            ]
        );
        Route::resource(
            'blogcategories',
            \App\Modules\Blog\Backend\Controllers\CategoryController::class,
            [
                'names' => [
                    'edit' => 'admin.blogcategories.edit',
                    'index' => 'admin.blogcategories.index',
                    'create' => 'admin.blogcategories.create',
                    'store' => 'admin.blogcategories.store',
                    'destroy' => 'admin.blogcategories.destroy',
                    'update' => 'admin.blogcategories.update'
                ],
            ]
        );

        Route::post('/blog-gallery-delete', [BlogController::class, 'galleryDelete'])->name('blogGallery.delete');
        Route::get('blog/delete/{id}', [App\Modules\Blog\Backend\Controllers\BlogController::class, 'delete'])->name('admin.blog.delete');
    }
);

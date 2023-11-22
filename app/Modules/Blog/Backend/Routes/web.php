<?php

use App\Modules\Blog\Backend\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Route::resource(
//     'blogs',
//     \App\Modules\Blog\Backend\Controllers\BlogController::class,
//     [
//         'names' => [
//             'edit' => 'blogs.edit',
//             'index' => 'admin.blogs.index',
//             'create' => 'blogs.create',
//             'store' => 'blogs.store',
//             'destroy' => 'blogs.destroy',
//             'update' => 'blogs.update',
//             'categories' => 'blogs.categories'
//         ],
//     ]
// );
Route::post('/blog-gallery-delete', [BlogController::class, 'galleryDelete'])->name('blogGallery.delete');

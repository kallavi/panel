<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{{modulePrefix}}'], function () {
    // Define module-specific routes here
    Route::get('/',[App\Modules\permission\Frontend\Controller::class,'index'])->name('{{modulePrefix}}.index');
});

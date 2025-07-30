<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\CreateFileController;
use Illuminate\Support\Facades\Route;

Route::post('files/store', [CreateFileController::class, 'store'])
    ->middleware(['auth:web']);


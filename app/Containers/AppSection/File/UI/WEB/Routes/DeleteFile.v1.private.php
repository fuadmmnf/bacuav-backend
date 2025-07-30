<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\DeleteFileController;
use Illuminate\Support\Facades\Route;

Route::delete('files/{id}', [DeleteFileController::class, 'destroy'])
    ->middleware(['auth:web']);


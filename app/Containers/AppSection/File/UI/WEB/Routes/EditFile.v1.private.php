<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\UpdateFileController;
use Illuminate\Support\Facades\Route;

Route::get('files/{id}/edit', [UpdateFileController::class, 'edit'])
    ->middleware(['auth:web']);


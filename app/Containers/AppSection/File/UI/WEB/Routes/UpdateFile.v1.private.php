<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\UpdateFileController;
use Illuminate\Support\Facades\Route;

Route::patch('files/{id}', [UpdateFileController::class, 'update'])
    ->middleware(['auth:web']);


<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\ListFilesController;
use Illuminate\Support\Facades\Route;

Route::get('files', [ListFilesController::class, 'index'])
    ->middleware(['auth:web']);


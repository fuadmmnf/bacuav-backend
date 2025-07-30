<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\FindFileByIdController;
use Illuminate\Support\Facades\Route;

Route::get('files/{id}', [FindFileByIdController::class, 'show'])
    ->middleware(['auth:web']);


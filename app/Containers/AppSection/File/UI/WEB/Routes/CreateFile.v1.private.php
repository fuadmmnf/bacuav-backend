<?php

use App\Containers\AppSection\File\UI\WEB\Controllers\CreateFileController;
use Illuminate\Support\Facades\Route;

Route::get('files/create', [CreateFileController::class, 'create'])
    ->middleware(['auth:web']);


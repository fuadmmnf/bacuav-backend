<?php

/**
 * @apiGroup           File
 * @apiName            Invoke
 *
 * @api                {PATCH} /v1/files/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\File\UI\API\Controllers\UpdateFileController;
use Illuminate\Support\Facades\Route;

Route::patch('files/{id}', UpdateFileController::class)
    ->middleware(['auth:api']);


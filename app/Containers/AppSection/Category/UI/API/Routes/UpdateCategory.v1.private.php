<?php

/**
 * @apiGroup           Category
 * @apiName            UpdateResource
 *
 * @api                {PATCH} /v1/resources/:id Update Category
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

use App\Containers\AppSection\Category\UI\API\Controllers\UpdateCategoryController;
use Illuminate\Support\Facades\Route;

Route::patch('categories/{id}', UpdateCategoryController::class)
    ->middleware(['auth:api']);


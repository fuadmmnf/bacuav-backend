<?php

/**
 * @apiGroup           Category
 * @apiName            FindResourceById
 *
 * @api                {GET} /v1/resources/:id Find Category By Id
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

use App\Containers\AppSection\Category\UI\API\Controllers\FindCategoryByIdController;
use Illuminate\Support\Facades\Route;

//Route::get('categories/{id}', FindCategoryByIdController::class)
//    ->middleware(['auth:api']);


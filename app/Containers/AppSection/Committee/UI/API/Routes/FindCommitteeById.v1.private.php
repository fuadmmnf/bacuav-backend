<?php

/**
 * @apiGroup           Committee
 * @apiName            FindCommitteeById
 *
 * @api                {GET} /v1/committees/:id Find Committee By Id
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

use App\Containers\AppSection\Committee\UI\API\Controllers\FindCommitteeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('committees/{id}', [FindCommitteeByIdController::class, 'findCommitteeById'])
    ->middleware(['auth:api']);


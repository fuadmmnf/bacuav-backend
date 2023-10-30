<?php

/**
 * @apiGroup           Election
 * @apiName            GetAllElections
 *
 * @api                {GET} /v1/elections Get All Elections
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

use App\Containers\AppSection\Election\UI\API\Controllers\GetAllElectionsController;
use Illuminate\Support\Facades\Route;

Route::get('elections', GetAllElectionsController::class)
    ->middleware(['auth:api']);


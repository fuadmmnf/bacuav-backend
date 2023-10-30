<?php

/**
 * @apiGroup           Election
 * @apiName            DeleteElection
 *
 * @api                {DELETE} /v1/elections/:id Delete Election
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

use App\Containers\AppSection\Election\UI\API\Controllers\DeleteElectionController;
use Illuminate\Support\Facades\Route;

Route::delete('elections/{id}', DeleteElectionController::class)
    ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           Election
 * @apiName            CreateElection
 *
 * @api                {POST} /v1/elections Create Election
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

use App\Containers\AppSection\Election\UI\API\Controllers\CreateElectionController;
use Illuminate\Support\Facades\Route;

Route::post('elections', CreateElectionController::class)
    ->middleware(['auth:api']);


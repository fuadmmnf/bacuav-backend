<?php

/**
 * @apiGroup           ElectionVoter
 * @apiName            DeleteElectionVoter
 *
 * @api                {DELETE} /v1/election-voters/:id Delete Election Voter
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

use App\Containers\AppSection\ElectionVoter\UI\API\Controllers\DeleteElectionVoterController;
use Illuminate\Support\Facades\Route;

Route::delete('election-voters/{id}', [DeleteElectionVoterController::class, 'deleteElectionVoter'])
    ->middleware(['auth:api']);


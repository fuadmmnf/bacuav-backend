<?php

/**
 * @apiGroup           ElectionVoter
 * @apiName            UpdateElectionVoter
 *
 * @api                {PATCH} /v1/election-voters/:id Update Election Voter
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

use App\Containers\AppSection\ElectionVoter\UI\API\Controllers\UpdateElectionVoterController;
use Illuminate\Support\Facades\Route;

Route::patch('election-voters/{id}', [UpdateElectionVoterController::class, 'updateElectionVoter'])
    ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           ElectionVoter
 * @apiName            CreateElectionVoter
 *
 * @api                {POST} /v1/election-voters Create Election Voter
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

use App\Containers\AppSection\ElectionVoter\UI\API\Controllers\CreateElectionVoterController;
use Illuminate\Support\Facades\Route;

Route::post('election-voters', [CreateElectionVoterController::class, 'createElectionVoter'])
    ->middleware(['auth:api']);


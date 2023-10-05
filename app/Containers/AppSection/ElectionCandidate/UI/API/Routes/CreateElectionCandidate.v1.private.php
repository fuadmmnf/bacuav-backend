<?php

/**
 * @apiGroup           ElectionCandidate
 * @apiName            CreateElectionCandidate
 *
 * @api                {POST} /v1/election-candidates Create Election Candidate
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

use App\Containers\AppSection\ElectionCandidate\UI\API\Controllers\CreateElectionCandidateController;
use Illuminate\Support\Facades\Route;

Route::post('election-candidates', [CreateElectionCandidateController::class, 'createElectionCandidate'])
    ->middleware(['auth:api']);


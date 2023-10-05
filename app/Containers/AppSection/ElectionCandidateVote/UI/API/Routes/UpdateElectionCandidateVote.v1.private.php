<?php

/**
 * @apiGroup           ElectionCandidateVote
 * @apiName            UpdateElectionCandidateVote
 *
 * @api                {PATCH} /v1/election-candidate-votes/:id Update Election Candidate Vote
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

use App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers\UpdateElectionCandidateVoteController;
use Illuminate\Support\Facades\Route;

Route::patch('election-candidate-votes/{id}', [UpdateElectionCandidateVoteController::class, 'updateElectionCandidateVote'])
    ->middleware(['auth:api']);


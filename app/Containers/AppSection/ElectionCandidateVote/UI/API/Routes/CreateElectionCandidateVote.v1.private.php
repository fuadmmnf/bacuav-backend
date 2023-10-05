<?php

/**
 * @apiGroup           ElectionCandidateVote
 * @apiName            CreateElectionCandidateVote
 *
 * @api                {POST} /v1/election-candidate-votes Create Election Candidate Vote
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

use App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers\CreateElectionCandidateVoteController;
use Illuminate\Support\Facades\Route;

Route::post('election-candidate-votes', [CreateElectionCandidateVoteController::class, 'createElectionCandidateVote'])
    ->middleware(['auth:api']);


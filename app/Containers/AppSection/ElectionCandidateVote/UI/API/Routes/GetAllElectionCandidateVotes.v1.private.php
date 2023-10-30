<?php

/**
 * @apiGroup           ElectionCandidateVote
 * @apiName            GetAllElectionCandidateVotes
 *
 * @api                {GET} /v1/election-candidate-votes Get All Election Candidate Votes
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

use App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers\GetAllElectionCandidateVotesController;
use Illuminate\Support\Facades\Route;

Route::get('election-candidate-votes', GetAllElectionCandidateVotesController::class)
    ->middleware(['auth:api']);


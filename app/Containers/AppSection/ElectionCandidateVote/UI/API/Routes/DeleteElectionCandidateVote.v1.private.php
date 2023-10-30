<?php

/**
 * @apiGroup           ElectionCandidateVote
 * @apiName            DeleteElectionCandidateVote
 *
 * @api                {DELETE} /v1/election-candidate-votes/:id Delete Election Candidate Vote
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

use App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers\DeleteElectionCandidateVoteController;
use Illuminate\Support\Facades\Route;

//Route::delete('election-candidate-votes/{id}', [DeleteElectionCandidateVoteController::class, 'deleteElectionCandidateVote'])
//    ->middleware(['auth:api']);


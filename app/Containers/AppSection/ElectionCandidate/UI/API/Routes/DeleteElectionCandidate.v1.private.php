<?php

/**
 * @apiGroup           ElectionCandidate
 * @apiName            DeleteElectionCandidate
 *
 * @api                {DELETE} /v1/election-candidates/:id Delete Election Candidate
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

use App\Containers\AppSection\ElectionCandidate\UI\API\Controllers\DeleteElectionCandidateController;
use Illuminate\Support\Facades\Route;

Route::delete('election-candidates/{id}', [DeleteElectionCandidateController::class, 'deleteElectionCandidate'])
    ->middleware(['auth:api']);


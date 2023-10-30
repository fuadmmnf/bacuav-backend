<?php

/**
 * @apiGroup           ElectionCandidate
 * @apiName            FindElectionCandidateById
 *
 * @api                {GET} /v1/election-candidates/:id Find Election Candidate By Id
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

use App\Containers\AppSection\ElectionCandidate\UI\API\Controllers\FindElectionCandidateByIdController;
use Illuminate\Support\Facades\Route;

Route::get('election-candidates/{id}', FindElectionCandidateByIdController::class)
    ->middleware(['auth:api']);


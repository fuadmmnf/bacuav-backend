<?php

/**
 * @apiGroup           ElectionVoter
 * @apiName            GetAllElectionVoters
 *
 * @api                {GET} /v1/election-voters Get All Election Voters
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

use App\Containers\AppSection\ElectionVoter\UI\API\Controllers\GetAllElectionVotersController;
use Illuminate\Support\Facades\Route;

Route::get('election-voters', [GetAllElectionVotersController::class, 'getAllElectionVoters'])
    ->middleware(['auth:api']);


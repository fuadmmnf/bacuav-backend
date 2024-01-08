<?php

/**
 * @apiGroup           Committee
 * @apiName            CreateCommittee
 *
 * @api                {POST} /v1/committees Create Committee
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

use App\Containers\AppSection\Committee\UI\API\Controllers\CreateCommitteeController;
use Illuminate\Support\Facades\Route;

Route::post('committees', [CreateCommitteeController::class, 'createCommittee'])
    ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           Committee
 * @apiName            GetAllCommittees
 *
 * @api                {GET} /v1/committees Get All Committees
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

use App\Containers\AppSection\Committee\UI\API\Controllers\GetAllCommitteesController;
use Illuminate\Support\Facades\Route;

Route::get('committees', [GetAllCommitteesController::class, 'getAllCommittees']);


<?php

/**
 * @apiGroup           CommitteeMember
 * @apiName            FindCommitteeMemberById
 *
 * @api                {GET} /v1/committee-members/:id Find Committee Member By Id
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

use App\Containers\AppSection\CommitteeMember\UI\API\Controllers\FindCommitteeMemberByIdController;
use Illuminate\Support\Facades\Route;

Route::get('committee-members/{id}', [FindCommitteeMemberByIdController::class, 'findCommitteeMemberById']);


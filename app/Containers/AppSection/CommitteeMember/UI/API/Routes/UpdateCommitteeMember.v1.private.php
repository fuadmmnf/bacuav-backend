<?php

/**
 * @apiGroup           CommitteeMember
 * @apiName            UpdateCommitteeMember
 *
 * @api                {PATCH} /v1/committee-members/:id Update Committee Member
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

use App\Containers\AppSection\CommitteeMember\UI\API\Controllers\UpdateCommitteeMemberController;
use Illuminate\Support\Facades\Route;

Route::patch('committee-members/{id}', [UpdateCommitteeMemberController::class, 'updateCommitteeMember'])
    ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           CommitteeMember
 * @apiName            DeleteCommitteeMember
 *
 * @api                {DELETE} /v1/committee-members/:id Delete Committee Member
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

use App\Containers\AppSection\CommitteeMember\UI\API\Controllers\DeleteCommitteeMemberController;
use Illuminate\Support\Facades\Route;

Route::delete('committee-members/{id}', [DeleteCommitteeMemberController::class, 'deleteCommitteeMember'])
    ->middleware(['auth:api']);


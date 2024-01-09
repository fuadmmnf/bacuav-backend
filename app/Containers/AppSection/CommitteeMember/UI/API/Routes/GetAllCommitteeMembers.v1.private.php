<?php

/**
 * @apiGroup           CommitteeMember
 * @apiName            GetAllCommitteeMembers
 *
 * @api                {GET} /v1/committee-members Get All Committee Members
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

use App\Containers\AppSection\CommitteeMember\UI\API\Controllers\GetAllCommitteeMembersController;
use Illuminate\Support\Facades\Route;

Route::get('committee-members', [GetAllCommitteeMembersController::class, 'getAllCommitteeMembers']);


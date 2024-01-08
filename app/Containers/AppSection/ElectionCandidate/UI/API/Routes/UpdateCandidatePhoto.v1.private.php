<?php

/**
 * @apiGroup           User
 * @apiName            UpdateUserPassword
 * @api                {patch} /v1/users/:id/password Update User's Password
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => ''] | Category Owner
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id user id
 *
 * @apiBody           {String} current_password
 * @apiBody           {String} new_password min: 8
 *
 * at least one character of the following:
 *
 * upper case letter
 *
 * lower case letter
 *
 * number
 *
 * special character
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\ElectionCandidate\UI\API\Controllers\UpdateCandidatePhotoController;
use Illuminate\Support\Facades\Route;

Route::post('election-candidates/{id}/photo', UpdateCandidatePhotoController::class)
    ->middleware(['auth:api']);

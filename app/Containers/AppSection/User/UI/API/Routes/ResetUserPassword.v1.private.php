<?php

/**
 * @apiGroup           User
 * @apiName            UpdateUserPassword
 * @api                {patch} /v1/users/:id/password/reset Reset User's Password
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => ''] | Category Owner
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id user id
 *
 * @apiBody           {String} identifier
 * @apiBody           {String} code
 * @apiBody           {String} password
 * @apiBody           {String} password_confirmed
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

use App\Containers\AppSection\User\UI\API\Controllers\ResetUserPasswordController;
use Illuminate\Support\Facades\Route;

//Route::patch('users/password/reset', ResetUserPasswordController::class);

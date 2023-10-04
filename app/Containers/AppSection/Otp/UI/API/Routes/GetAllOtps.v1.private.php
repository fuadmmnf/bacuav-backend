<?php

/**
 * @apiGroup           Otp
 * @apiName            GetAllOtps
 *
 * @api                {GET} /v1/otps Get All Otps
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

use App\Containers\AppSection\Otp\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('otps', [Controller::class, 'getAllOtps'])
    ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           MonthlyPayment
 * @apiName            CreateMonthlyPayment
 *
 * @api                {POST} /v1/monthly-payments Create Monthly Payment
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

use App\Containers\AppSection\MonthlyPayment\UI\API\Controllers\CreateMonthlyPaymentController;
use Illuminate\Support\Facades\Route;

Route::post('monthly-payments', [CreateMonthlyPaymentController::class, 'createMonthlyPayment'])
    ->middleware(['auth:api']);


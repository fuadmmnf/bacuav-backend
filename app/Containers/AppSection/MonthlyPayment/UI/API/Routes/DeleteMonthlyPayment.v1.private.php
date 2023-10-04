<?php

/**
 * @apiGroup           MonthlyPayment
 * @apiName            DeleteMonthlyPayment
 *
 * @api                {DELETE} /v1/monthly-payments/:id Delete Monthly Payment
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

use App\Containers\AppSection\MonthlyPayment\UI\API\Controllers\DeleteMonthlyPaymentController;
use Illuminate\Support\Facades\Route;

Route::delete('monthly-payments/{id}', [DeleteMonthlyPaymentController::class, 'deleteMonthlyPayment'])
    ->middleware(['auth:api']);


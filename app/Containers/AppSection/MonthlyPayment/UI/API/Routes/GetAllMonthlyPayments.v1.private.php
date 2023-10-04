<?php

/**
 * @apiGroup           MonthlyPayment
 * @apiName            GetAllMonthlyPayments
 *
 * @api                {GET} /v1/monthly-payments Get All Monthly Payments
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

use App\Containers\AppSection\MonthlyPayment\UI\API\Controllers\GetAllMonthlyPaymentsController;
use Illuminate\Support\Facades\Route;

Route::get('monthly-payments', [GetAllMonthlyPaymentsController::class, 'getAllMonthlyPayments'])
    ->middleware(['auth:api']);


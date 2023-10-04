<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Controllers;

use App\Containers\AppSection\MonthlyPayment\Actions\DeleteMonthlyPaymentAction;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\DeleteMonthlyPaymentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteMonthlyPaymentController extends ApiController
{
    /**
     * @param DeleteMonthlyPaymentRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteMonthlyPayment(DeleteMonthlyPaymentRequest $request): JsonResponse
    {
        app(DeleteMonthlyPaymentAction::class)->run($request);

        return $this->noContent();
    }
}

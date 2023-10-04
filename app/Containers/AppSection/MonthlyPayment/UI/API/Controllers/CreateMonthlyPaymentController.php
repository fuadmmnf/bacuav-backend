<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\MonthlyPayment\Actions\CreateMonthlyPaymentAction;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\CreateMonthlyPaymentRequest;
use App\Containers\AppSection\MonthlyPayment\UI\API\Transformers\MonthlyPaymentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateMonthlyPaymentController extends ApiController
{
    /**
     * @param CreateMonthlyPaymentRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createMonthlyPayment(CreateMonthlyPaymentRequest $request): JsonResponse
    {
        $monthlypayment = app(CreateMonthlyPaymentAction::class)->run($request);

        return $this->created($this->transform($monthlypayment, MonthlyPaymentTransformer::class));
    }
}

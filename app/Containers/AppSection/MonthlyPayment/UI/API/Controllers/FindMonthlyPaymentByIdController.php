<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\MonthlyPayment\Actions\FindMonthlyPaymentByIdAction;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\FindMonthlyPaymentByIdRequest;
use App\Containers\AppSection\MonthlyPayment\UI\API\Transformers\MonthlyPaymentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindMonthlyPaymentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findMonthlyPaymentById(FindMonthlyPaymentByIdRequest $request): array
    {
        $monthlypayment = app(FindMonthlyPaymentByIdAction::class)->run($request);

        return $this->transform($monthlypayment, MonthlyPaymentTransformer::class);
    }
}

<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\MonthlyPayment\Actions\UpdateMonthlyPaymentAction;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\UpdateMonthlyPaymentRequest;
use App\Containers\AppSection\MonthlyPayment\UI\API\Transformers\MonthlyPaymentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateMonthlyPaymentController extends ApiController
{
    /**
     * @param UpdateMonthlyPaymentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateMonthlyPayment(UpdateMonthlyPaymentRequest $request): array
    {
        $monthlypayment = app(UpdateMonthlyPaymentAction::class)->run($request);

        return $this->transform($monthlypayment, MonthlyPaymentTransformer::class);
    }
}

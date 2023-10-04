<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\MonthlyPayment\Actions\GetAllMonthlyPaymentsAction;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\GetAllMonthlyPaymentsRequest;
use App\Containers\AppSection\MonthlyPayment\UI\API\Transformers\MonthlyPaymentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMonthlyPaymentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllMonthlyPayments(GetAllMonthlyPaymentsRequest $request): array
    {
        $monthlypayments = app(GetAllMonthlyPaymentsAction::class)->run($request);

        return $this->transform($monthlypayments, MonthlyPaymentTransformer::class);
    }
}

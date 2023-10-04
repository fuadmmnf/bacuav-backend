<?php

namespace App\Containers\AppSection\MonthlyPayment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\MonthlyPayment\Tasks\GetAllMonthlyPaymentsTask;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\GetAllMonthlyPaymentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMonthlyPaymentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllMonthlyPaymentsRequest $request): mixed
    {
        return app(GetAllMonthlyPaymentsTask::class)->run();
    }
}

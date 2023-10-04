<?php

namespace App\Containers\AppSection\MonthlyPayment\Actions;

use App\Containers\AppSection\MonthlyPayment\Tasks\DeleteMonthlyPaymentTask;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\DeleteMonthlyPaymentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMonthlyPaymentAction extends ParentAction
{
    /**
     * @param DeleteMonthlyPaymentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMonthlyPaymentRequest $request): int
    {
        return app(DeleteMonthlyPaymentTask::class)->run($request->id);
    }
}

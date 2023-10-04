<?php

namespace App\Containers\AppSection\MonthlyPayment\Actions;

use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Containers\AppSection\MonthlyPayment\Tasks\FindMonthlyPaymentByIdTask;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\FindMonthlyPaymentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindMonthlyPaymentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindMonthlyPaymentByIdRequest $request): MonthlyPayment
    {
        return app(FindMonthlyPaymentByIdTask::class)->run($request->id);
    }
}

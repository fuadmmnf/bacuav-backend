<?php

namespace App\Containers\AppSection\MonthlyPayment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Containers\AppSection\MonthlyPayment\Tasks\CreateMonthlyPaymentTask;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\CreateMonthlyPaymentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMonthlyPaymentAction extends ParentAction
{
    /**
     * @param CreateMonthlyPaymentRequest $request
     * @return MonthlyPayment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateMonthlyPaymentRequest $request): MonthlyPayment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateMonthlyPaymentTask::class)->run($data);
    }
}

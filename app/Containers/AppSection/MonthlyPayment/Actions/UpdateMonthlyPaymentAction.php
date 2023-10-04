<?php

namespace App\Containers\AppSection\MonthlyPayment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Containers\AppSection\MonthlyPayment\Tasks\UpdateMonthlyPaymentTask;
use App\Containers\AppSection\MonthlyPayment\UI\API\Requests\UpdateMonthlyPaymentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateMonthlyPaymentAction extends ParentAction
{
    /**
     * @param UpdateMonthlyPaymentRequest $request
     * @return MonthlyPayment
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateMonthlyPaymentRequest $request): MonthlyPayment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateMonthlyPaymentTask::class)->run($data, $request->id);
    }
}

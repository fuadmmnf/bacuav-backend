<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use App\Containers\AppSection\Transaction\Actions\DeleteTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\DeleteTransactionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteTransactionController extends ApiController
{
    /**
     * @param DeleteTransactionRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteTransaction(DeleteTransactionRequest $request): JsonResponse
    {
        app(DeleteTransactionAction::class)->run($request);

        return $this->noContent();
    }
}

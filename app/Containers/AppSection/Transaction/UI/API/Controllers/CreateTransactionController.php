<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\CreateTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\CreateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateTransactionController extends ApiController
{
    /**
     * @param CreateTransactionRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createTransaction(CreateTransactionRequest $request): JsonResponse
    {
        $transaction = app(CreateTransactionAction::class)->run($request);

        return $this->created($this->transform($transaction, TransactionTransformer::class));
    }
}

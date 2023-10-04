<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\UpdateTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\UpdateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateTransactionController extends ApiController
{
    /**
     * @param UpdateTransactionRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateTransaction(UpdateTransactionRequest $request): array
    {
        $transaction = app(UpdateTransactionAction::class)->run($request);

        return $this->transform($transaction, TransactionTransformer::class);
    }
}

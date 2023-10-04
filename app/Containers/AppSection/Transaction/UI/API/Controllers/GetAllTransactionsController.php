<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\GetAllTransactionsAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetAllTransactionsRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTransactionsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTransactions(GetAllTransactionsRequest $request): array
    {
        $transactions = app(GetAllTransactionsAction::class)->run($request);

        return $this->transform($transactions, TransactionTransformer::class);
    }
}

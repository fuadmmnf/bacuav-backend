<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TransactionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Transaction $transaction): array
    {
        $response = [
            'object' => $transaction->getResourceKey(),
            'id' => $transaction->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $transaction->id,
            'created_at' => $transaction->created_at,
            'updated_at' => $transaction->updated_at,
            'readable_created_at' => $transaction->created_at->diffForHumans(),
            'readable_updated_at' => $transaction->updated_at->diffForHumans(),
            // 'deleted_at' => $transaction->deleted_at,
        ], $response);
    }
}

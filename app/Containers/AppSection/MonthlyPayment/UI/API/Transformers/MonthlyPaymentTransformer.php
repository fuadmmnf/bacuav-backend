<?php

namespace App\Containers\AppSection\MonthlyPayment\UI\API\Transformers;

use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MonthlyPaymentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(MonthlyPayment $monthlypayment): array
    {
        $response = [
            'object' => $monthlypayment->getResourceKey(),
            'id' => $monthlypayment->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $monthlypayment->id,
            'created_at' => $monthlypayment->created_at,
            'updated_at' => $monthlypayment->updated_at,
            'readable_created_at' => $monthlypayment->created_at->diffForHumans(),
            'readable_updated_at' => $monthlypayment->updated_at->diffForHumans(),
            // 'deleted_at' => $monthlypayment->deleted_at,
        ], $response);
    }
}

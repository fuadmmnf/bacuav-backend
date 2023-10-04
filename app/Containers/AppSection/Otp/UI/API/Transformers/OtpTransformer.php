<?php

namespace App\Containers\AppSection\Otp\UI\API\Transformers;

use App\Containers\AppSection\Otp\Models\Otp;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class OtpTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Otp $otp): array
    {
        $response = [
            'object' => $otp->getResourceKey(),
            'id' => $otp->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $otp->id,
            'created_at' => $otp->created_at,
            'updated_at' => $otp->updated_at,
            'readable_created_at' => $otp->created_at->diffForHumans(),
            'readable_updated_at' => $otp->updated_at->diffForHumans(),
            // 'deleted_at' => $otp->deleted_at,
        ], $response);
    }
}

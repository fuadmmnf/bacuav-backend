<?php

namespace App\Containers\AppSection\Committee\UI\API\Controllers;

use App\Containers\AppSection\Committee\Actions\DeleteCommitteeAction;
use App\Containers\AppSection\Committee\UI\API\Requests\DeleteCommitteeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCommitteeController extends ApiController
{
    /**
     * @param DeleteCommitteeRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteCommittee(DeleteCommitteeRequest $request): JsonResponse
    {
        app(DeleteCommitteeAction::class)->run($request);

        return $this->noContent();
    }
}

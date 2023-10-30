<?php

namespace App\Containers\AppSection\Election\UI\API\Controllers;

use App\Containers\AppSection\Election\Actions\DeleteElectionAction;
use App\Containers\AppSection\Election\UI\API\Requests\DeleteElectionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteElectionController extends ApiController
{
    /**
     * @param DeleteElectionRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteElectionRequest $request): JsonResponse
    {
        app(DeleteElectionAction::class)->run($request);

        return $this->noContent();
    }
}

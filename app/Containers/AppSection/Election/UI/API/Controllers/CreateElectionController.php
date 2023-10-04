<?php

namespace App\Containers\AppSection\Election\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Election\Actions\CreateElectionAction;
use App\Containers\AppSection\Election\UI\API\Requests\CreateElectionRequest;
use App\Containers\AppSection\Election\UI\API\Transformers\ElectionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateElectionController extends ApiController
{
    /**
     * @param CreateElectionRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createElection(CreateElectionRequest $request): JsonResponse
    {
        $election = app(CreateElectionAction::class)->run($request);

        return $this->created($this->transform($election, ElectionTransformer::class));
    }
}

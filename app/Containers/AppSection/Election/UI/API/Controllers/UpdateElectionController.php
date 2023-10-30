<?php

namespace App\Containers\AppSection\Election\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Election\Actions\UpdateElectionAction;
use App\Containers\AppSection\Election\UI\API\Requests\UpdateElectionRequest;
use App\Containers\AppSection\Election\UI\API\Transformers\ElectionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateElectionController extends ApiController
{
    /**
     * @param UpdateElectionRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateElectionRequest $request): array
    {
        $election = app(UpdateElectionAction::class)->run($request);

        return $this->transform($election, ElectionTransformer::class);
    }
}

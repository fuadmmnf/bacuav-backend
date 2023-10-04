<?php

namespace App\Containers\AppSection\Election\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Election\Actions\FindElectionByIdAction;
use App\Containers\AppSection\Election\UI\API\Requests\FindElectionByIdRequest;
use App\Containers\AppSection\Election\UI\API\Transformers\ElectionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindElectionByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findElectionById(FindElectionByIdRequest $request): array
    {
        $election = app(FindElectionByIdAction::class)->run($request);

        return $this->transform($election, ElectionTransformer::class);
    }
}

<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionVoter\Actions\FindElectionVoterByIdAction;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\FindElectionVoterByIdRequest;
use App\Containers\AppSection\ElectionVoter\UI\API\Transformers\ElectionVoterTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindElectionVoterByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findElectionVoterById(FindElectionVoterByIdRequest $request): array
    {
        $electionvoter = app(FindElectionVoterByIdAction::class)->run($request);

        return $this->transform($electionvoter, ElectionVoterTransformer::class);
    }
}

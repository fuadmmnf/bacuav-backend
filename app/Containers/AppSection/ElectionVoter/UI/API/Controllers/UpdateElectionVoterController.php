<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionVoter\Actions\UpdateElectionVoterAction;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\UpdateElectionVoterRequest;
use App\Containers\AppSection\ElectionVoter\UI\API\Transformers\ElectionVoterTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateElectionVoterController extends ApiController
{
    /**
     * @param UpdateElectionVoterRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateElectionVoter(UpdateElectionVoterRequest $request): array
    {
        $electionvoter = app(UpdateElectionVoterAction::class)->run($request);

        return $this->transform($electionvoter, ElectionVoterTransformer::class);
    }
}

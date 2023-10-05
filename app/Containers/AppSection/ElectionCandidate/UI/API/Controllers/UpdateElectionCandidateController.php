<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidate\Actions\UpdateElectionCandidateAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\UpdateElectionCandidateRequest;
use App\Containers\AppSection\ElectionCandidate\UI\API\Transformers\ElectionCandidateTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateElectionCandidateController extends ApiController
{
    /**
     * @param UpdateElectionCandidateRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateElectionCandidate(UpdateElectionCandidateRequest $request): array
    {
        $electioncandidate = app(UpdateElectionCandidateAction::class)->run($request);

        return $this->transform($electioncandidate, ElectionCandidateTransformer::class);
    }
}

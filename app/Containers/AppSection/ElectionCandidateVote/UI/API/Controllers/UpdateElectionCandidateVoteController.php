<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidateVote\Actions\UpdateElectionCandidateVoteAction;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\UpdateElectionCandidateVoteRequest;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Transformers\ElectionCandidateVoteTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateElectionCandidateVoteController extends ApiController
{
    /**
     * @param UpdateElectionCandidateVoteRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateElectionCandidateVoteRequest $request): array
    {
        $electioncandidatevote = app(UpdateElectionCandidateVoteAction::class)->run($request);

        return $this->transform($electioncandidatevote, ElectionCandidateVoteTransformer::class);
    }
}

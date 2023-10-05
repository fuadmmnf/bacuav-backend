<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidateVote\Actions\FindElectionCandidateVoteByIdAction;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\FindElectionCandidateVoteByIdRequest;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Transformers\ElectionCandidateVoteTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindElectionCandidateVoteByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findElectionCandidateVoteById(FindElectionCandidateVoteByIdRequest $request): array
    {
        $electioncandidatevote = app(FindElectionCandidateVoteByIdAction::class)->run($request);

        return $this->transform($electioncandidatevote, ElectionCandidateVoteTransformer::class);
    }
}

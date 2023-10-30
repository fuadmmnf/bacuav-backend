<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidateVote\Actions\GetAllElectionCandidateVotesAction;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\GetAllElectionCandidateVotesRequest;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Transformers\ElectionCandidateVoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidateVotesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetAllElectionCandidateVotesRequest $request): array
    {
        $electioncandidatevotes = app(GetAllElectionCandidateVotesAction::class)->run($request);

        return $this->transform($electioncandidatevotes, ElectionCandidateVoteTransformer::class);
    }
}

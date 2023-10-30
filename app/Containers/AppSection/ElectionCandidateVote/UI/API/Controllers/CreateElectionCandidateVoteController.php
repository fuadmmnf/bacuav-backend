<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidateVote\Actions\CreateElectionCandidateVoteAction;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\CreateElectionCandidateVoteRequest;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Transformers\ElectionCandidateVoteTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateElectionCandidateVoteController extends ApiController
{
    /**
     * @param CreateElectionCandidateVoteRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateElectionCandidateVoteRequest $request): JsonResponse
    {
        $electioncandidatevote = app(CreateElectionCandidateVoteAction::class)->run($request);

        return $this->created($this->transform($electioncandidatevote, ElectionCandidateVoteTransformer::class));
    }
}

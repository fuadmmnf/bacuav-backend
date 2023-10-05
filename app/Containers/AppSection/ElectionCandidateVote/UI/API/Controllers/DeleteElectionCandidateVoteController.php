<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Controllers;

use App\Containers\AppSection\ElectionCandidateVote\Actions\DeleteElectionCandidateVoteAction;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\DeleteElectionCandidateVoteRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteElectionCandidateVoteController extends ApiController
{
    /**
     * @param DeleteElectionCandidateVoteRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteElectionCandidateVote(DeleteElectionCandidateVoteRequest $request): JsonResponse
    {
        app(DeleteElectionCandidateVoteAction::class)->run($request);

        return $this->noContent();
    }
}

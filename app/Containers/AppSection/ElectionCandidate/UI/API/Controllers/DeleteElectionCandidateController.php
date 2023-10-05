<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use App\Containers\AppSection\ElectionCandidate\Actions\DeleteElectionCandidateAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\DeleteElectionCandidateRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteElectionCandidateController extends ApiController
{
    /**
     * @param DeleteElectionCandidateRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteElectionCandidate(DeleteElectionCandidateRequest $request): JsonResponse
    {
        app(DeleteElectionCandidateAction::class)->run($request);

        return $this->noContent();
    }
}

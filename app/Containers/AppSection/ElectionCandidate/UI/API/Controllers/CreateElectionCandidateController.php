<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidate\Actions\CreateElectionCandidateAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\CreateElectionCandidateRequest;
use App\Containers\AppSection\ElectionCandidate\UI\API\Transformers\ElectionCandidateTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateElectionCandidateController extends ApiController
{
    /**
     * @param CreateElectionCandidateRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateElectionCandidateRequest $request): JsonResponse
    {
        $electioncandidate = app(CreateElectionCandidateAction::class)->run($request);

        return $this->created($this->transform($electioncandidate, ElectionCandidateTransformer::class));
    }
}

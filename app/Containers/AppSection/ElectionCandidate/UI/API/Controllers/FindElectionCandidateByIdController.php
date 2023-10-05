<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidate\Actions\FindElectionCandidateByIdAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\FindElectionCandidateByIdRequest;
use App\Containers\AppSection\ElectionCandidate\UI\API\Transformers\ElectionCandidateTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindElectionCandidateByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findElectionCandidateById(FindElectionCandidateByIdRequest $request): array
    {
        $electioncandidate = app(FindElectionCandidateByIdAction::class)->run($request);

        return $this->transform($electioncandidate, ElectionCandidateTransformer::class);
    }
}

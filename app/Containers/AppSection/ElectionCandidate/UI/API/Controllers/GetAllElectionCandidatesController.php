<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionCandidate\Actions\GetAllElectionCandidatesAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\GetAllElectionCandidatesRequest;
use App\Containers\AppSection\ElectionCandidate\UI\API\Transformers\ElectionCandidateTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidatesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetAllElectionCandidatesRequest $request): array
    {
        $electioncandidates = app(GetAllElectionCandidatesAction::class)->run($request);

        return $this->transform($electioncandidates, ElectionCandidateTransformer::class);
    }
}

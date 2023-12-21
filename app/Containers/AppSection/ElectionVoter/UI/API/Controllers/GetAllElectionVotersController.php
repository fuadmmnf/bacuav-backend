<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionVoter\Actions\GetAllElectionVotersAction;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\GetAllElectionVotersRequest;
use App\Containers\AppSection\ElectionVoter\UI\API\Transformers\ElectionVoterTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionVotersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllElectionVoters(GetAllElectionVotersRequest $request): array
    {
        $electionvoters = app(GetAllElectionVotersAction::class)->run($request);

        return $this->transform($electionvoters, ElectionVoterTransformer::class);
    }
}

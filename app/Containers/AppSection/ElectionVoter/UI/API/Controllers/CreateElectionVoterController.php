<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ElectionVoter\Actions\CreateElectionVoterAction;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\CreateElectionVoterRequest;
use App\Containers\AppSection\ElectionVoter\UI\API\Transformers\ElectionVoterTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateElectionVoterController extends ApiController
{
    /**
     * @param CreateElectionVoterRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createElectionVoter(CreateElectionVoterRequest $request): JsonResponse
    {
        $electionvoter = app(CreateElectionVoterAction::class)->run($request);

        return $this->created($this->transform($electionvoter, ElectionVoterTransformer::class));
    }
}

<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Controllers;

use App\Containers\AppSection\ElectionVoter\Actions\DeleteElectionVoterAction;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\DeleteElectionVoterRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteElectionVoterController extends ApiController
{
    /**
     * @param DeleteElectionVoterRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteElectionVoter(DeleteElectionVoterRequest $request): JsonResponse
    {
        app(DeleteElectionVoterAction::class)->run($request);

        return $this->noContent();
    }
}

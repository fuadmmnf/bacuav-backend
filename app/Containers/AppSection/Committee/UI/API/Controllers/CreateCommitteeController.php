<?php

namespace App\Containers\AppSection\Committee\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Committee\Actions\CreateCommitteeAction;
use App\Containers\AppSection\Committee\UI\API\Requests\CreateCommitteeRequest;
use App\Containers\AppSection\Committee\UI\API\Transformers\CommitteeTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCommitteeController extends ApiController
{
    /**
     * @param CreateCommitteeRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createCommittee(CreateCommitteeRequest $request): JsonResponse
    {
        $committee = app(CreateCommitteeAction::class)->run($request);

        return $this->created($this->transform($committee, CommitteeTransformer::class));
    }
}

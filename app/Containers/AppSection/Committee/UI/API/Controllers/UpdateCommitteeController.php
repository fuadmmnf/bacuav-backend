<?php

namespace App\Containers\AppSection\Committee\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Committee\Actions\UpdateCommitteeAction;
use App\Containers\AppSection\Committee\UI\API\Requests\UpdateCommitteeRequest;
use App\Containers\AppSection\Committee\UI\API\Transformers\CommitteeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCommitteeController extends ApiController
{
    /**
     * @param UpdateCommitteeRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateCommittee(UpdateCommitteeRequest $request): array
    {
        $committee = app(UpdateCommitteeAction::class)->run($request);

        return $this->transform($committee, CommitteeTransformer::class);
    }
}

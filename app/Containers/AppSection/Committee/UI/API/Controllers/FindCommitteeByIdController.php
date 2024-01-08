<?php

namespace App\Containers\AppSection\Committee\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Committee\Actions\FindCommitteeByIdAction;
use App\Containers\AppSection\Committee\UI\API\Requests\FindCommitteeByIdRequest;
use App\Containers\AppSection\Committee\UI\API\Transformers\CommitteeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCommitteeByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findCommitteeById(FindCommitteeByIdRequest $request): array
    {
        $committee = app(FindCommitteeByIdAction::class)->run($request);

        return $this->transform($committee, CommitteeTransformer::class);
    }
}

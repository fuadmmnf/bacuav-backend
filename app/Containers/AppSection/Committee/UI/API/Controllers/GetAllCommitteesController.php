<?php

namespace App\Containers\AppSection\Committee\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Committee\Actions\GetAllCommitteesAction;
use App\Containers\AppSection\Committee\UI\API\Requests\GetAllCommitteesRequest;
use App\Containers\AppSection\Committee\UI\API\Transformers\CommitteeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommitteesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCommittees(GetAllCommitteesRequest $request): array
    {
        $committees = app(GetAllCommitteesAction::class)->run($request);

        return $this->transform($committees, CommitteeTransformer::class);
    }
}

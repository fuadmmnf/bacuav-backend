<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\CommitteeMember\Actions\GetAllCommitteeMembersAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\GetAllCommitteeMembersRequest;
use App\Containers\AppSection\CommitteeMember\UI\API\Transformers\CommitteeMemberTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommitteeMembersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCommitteeMembers(GetAllCommitteeMembersRequest $request): array
    {
        $committeemembers = app(GetAllCommitteeMembersAction::class)->run($request);

        return $this->transform($committeemembers, CommitteeMemberTransformer::class);
    }
}

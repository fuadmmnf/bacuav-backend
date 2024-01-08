<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\CommitteeMember\Actions\UpdateCommitteeMemberAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\UpdateCommitteeMemberRequest;
use App\Containers\AppSection\CommitteeMember\UI\API\Transformers\CommitteeMemberTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCommitteeMemberController extends ApiController
{
    /**
     * @param UpdateCommitteeMemberRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateCommitteeMember(UpdateCommitteeMemberRequest $request): array
    {
        $committeemember = app(UpdateCommitteeMemberAction::class)->run($request);

        return $this->transform($committeemember, CommitteeMemberTransformer::class);
    }
}

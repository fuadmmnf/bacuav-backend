<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\CommitteeMember\Actions\FindCommitteeMemberByIdAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\FindCommitteeMemberByIdRequest;
use App\Containers\AppSection\CommitteeMember\UI\API\Transformers\CommitteeMemberTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCommitteeMemberByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findCommitteeMemberById(FindCommitteeMemberByIdRequest $request): array
    {
        $committeemember = app(FindCommitteeMemberByIdAction::class)->run($request);

        return $this->transform($committeemember, CommitteeMemberTransformer::class);
    }
}

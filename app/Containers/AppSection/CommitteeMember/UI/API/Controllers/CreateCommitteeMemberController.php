<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\CommitteeMember\Actions\CreateCommitteeMemberAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\CreateCommitteeMemberRequest;
use App\Containers\AppSection\CommitteeMember\UI\API\Transformers\CommitteeMemberTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCommitteeMemberController extends ApiController
{
    /**
     * @param CreateCommitteeMemberRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createCommitteeMember(CreateCommitteeMemberRequest $request): JsonResponse
    {
        $committeemember = app(CreateCommitteeMemberAction::class)->run($request);

        return $this->created($this->transform($committeemember, CommitteeMemberTransformer::class));
    }
}

<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use App\Containers\AppSection\CommitteeMember\Actions\DeleteCommitteeMemberAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\DeleteCommitteeMemberRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCommitteeMemberController extends ApiController
{
    /**
     * @param DeleteCommitteeMemberRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteCommitteeMember(DeleteCommitteeMemberRequest $request): JsonResponse
    {
        app(DeleteCommitteeMemberAction::class)->run($request);

        return $this->noContent();
    }
}

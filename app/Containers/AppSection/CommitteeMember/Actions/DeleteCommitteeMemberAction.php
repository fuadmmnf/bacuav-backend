<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use App\Containers\AppSection\CommitteeMember\Tasks\DeleteCommitteeMemberTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\DeleteCommitteeMemberRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCommitteeMemberAction extends ParentAction
{
    /**
     * @param DeleteCommitteeMemberRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCommitteeMemberRequest $request): int
    {
        return app(DeleteCommitteeMemberTask::class)->run($request->id);
    }
}

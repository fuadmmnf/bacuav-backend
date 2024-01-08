<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\CommitteeMember\Tasks\FindCommitteeMemberByIdTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\FindCommitteeMemberByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCommitteeMemberByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCommitteeMemberByIdRequest $request): CommitteeMember
    {
        return app(FindCommitteeMemberByIdTask::class)->run($request->id);
    }
}

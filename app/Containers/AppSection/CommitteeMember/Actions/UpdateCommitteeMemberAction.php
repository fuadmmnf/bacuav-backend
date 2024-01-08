<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\CommitteeMember\Tasks\UpdateCommitteeMemberTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\UpdateCommitteeMemberRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCommitteeMemberAction extends ParentAction
{
    /**
     * @param UpdateCommitteeMemberRequest $request
     * @return CommitteeMember
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCommitteeMemberRequest $request): CommitteeMember
    {
        $data = $request->sanitizeInput([
            'committee_id',
            'name',
            'designation',
            'description',
        ]);

        return app(UpdateCommitteeMemberTask::class)->run($data, $request->id);
    }
}

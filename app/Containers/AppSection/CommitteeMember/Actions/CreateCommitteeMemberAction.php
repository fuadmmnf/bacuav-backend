<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\CommitteeMember\Tasks\CreateCommitteeMemberTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\CreateCommitteeMemberRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCommitteeMemberAction extends ParentAction
{
    /**
     * @param CreateCommitteeMemberRequest $request
     * @return CommitteeMember
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCommitteeMemberRequest $request): CommitteeMember
    {
        $data = $request->sanitizeInput([
            'committee_id',
            'name',
            'designation',
            'description',
        ]);

        return app(CreateCommitteeMemberTask::class)->run($data);
    }
}

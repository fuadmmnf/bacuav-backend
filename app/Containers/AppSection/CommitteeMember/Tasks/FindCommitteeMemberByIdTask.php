<?php

namespace App\Containers\AppSection\CommitteeMember\Tasks;

use App\Containers\AppSection\CommitteeMember\Data\Repositories\CommitteeMemberRepository;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCommitteeMemberByIdTask extends ParentTask
{
    public function __construct(
        protected CommitteeMemberRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): CommitteeMember
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}

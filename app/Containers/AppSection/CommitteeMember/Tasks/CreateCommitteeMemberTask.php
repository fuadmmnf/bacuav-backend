<?php

namespace App\Containers\AppSection\CommitteeMember\Tasks;

use App\Containers\AppSection\CommitteeMember\Data\Repositories\CommitteeMemberRepository;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCommitteeMemberTask extends ParentTask
{
    public function __construct(
        protected CommitteeMemberRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): CommitteeMember
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}

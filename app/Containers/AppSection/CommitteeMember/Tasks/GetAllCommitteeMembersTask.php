<?php

namespace App\Containers\AppSection\CommitteeMember\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\CommitteeMember\Data\Repositories\CommitteeMemberRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommitteeMembersTask extends ParentTask
{
    public function __construct(
        protected CommitteeMemberRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}

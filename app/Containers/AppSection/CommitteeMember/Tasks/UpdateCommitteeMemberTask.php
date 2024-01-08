<?php

namespace App\Containers\AppSection\CommitteeMember\Tasks;

use App\Containers\AppSection\CommitteeMember\Data\Repositories\CommitteeMemberRepository;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCommitteeMemberTask extends ParentTask
{
    public function __construct(
        protected CommitteeMemberRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): CommitteeMember
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

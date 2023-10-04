<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\WithTrashedCriteria;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteUserTask extends ParentTask
{
    public function __construct(
        protected readonly UserRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id, bool $is_admin = false): int
    {
        try {
            if($is_admin) {
                $this->repository->pushCriteria(new WithTrashedCriteria());
                $user = $this->repository->find($id);

                return $user->history()->forceDelete();
            } else {
                return $this->repository->delete($id);
            }

        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}

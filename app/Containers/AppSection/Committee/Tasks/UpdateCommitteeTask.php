<?php

namespace App\Containers\AppSection\Committee\Tasks;

use App\Containers\AppSection\Committee\Data\Repositories\CommitteeRepository;
use App\Containers\AppSection\Committee\Models\Committee;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCommitteeTask extends ParentTask
{
    public function __construct(
        protected CommitteeRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Committee
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

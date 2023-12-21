<?php

namespace App\Containers\AppSection\ElectionVoter\Tasks;

use App\Containers\AppSection\ElectionVoter\Data\Repositories\ElectionVoterRepository;
use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateElectionVoterTask extends ParentTask
{
    public function __construct(
        protected ElectionVoterRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ElectionVoter
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

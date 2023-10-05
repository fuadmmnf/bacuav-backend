<?php

namespace App\Containers\AppSection\ElectionCandidate\Tasks;

use App\Containers\AppSection\ElectionCandidate\Data\Repositories\ElectionCandidateRepository;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateElectionCandidateTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ElectionCandidate
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

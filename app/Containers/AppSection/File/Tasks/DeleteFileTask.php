<?php

namespace App\Containers\AppSection\File\Tasks;

use App\Containers\AppSection\File\Data\Repositories\FileRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteFileTask extends ParentTask
{
    public function __construct(
        private readonly FileRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}

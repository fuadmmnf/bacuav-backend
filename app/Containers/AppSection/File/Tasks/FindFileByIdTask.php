<?php

namespace App\Containers\AppSection\File\Tasks;

use App\Containers\AppSection\File\Data\Repositories\FileRepository;
use App\Containers\AppSection\File\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFileByIdTask extends ParentTask
{
    public function __construct(
        private readonly FileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): File
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}

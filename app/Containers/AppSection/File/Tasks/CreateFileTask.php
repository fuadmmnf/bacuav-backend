<?php

namespace App\Containers\AppSection\File\Tasks;

use App\Containers\AppSection\File\Data\Repositories\FileRepository;
use App\Containers\AppSection\File\Models\File;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateFileTask extends ParentTask
{
    public function __construct(
        private readonly FileRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): File
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}

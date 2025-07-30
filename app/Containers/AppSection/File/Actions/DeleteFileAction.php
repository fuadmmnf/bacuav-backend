<?php

namespace App\Containers\AppSection\File\Actions;

use App\Containers\AppSection\File\Tasks\DeleteFileTask;
use App\Containers\AppSection\File\UI\API\Requests\DeleteFileRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFileAction extends ParentAction
{
    public function __construct(
        private readonly DeleteFileTask $deleteFileTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFileRequest $request): int
    {
        return $this->deleteFileTask->run($request->id);
    }
}

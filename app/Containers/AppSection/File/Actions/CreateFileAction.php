<?php

namespace App\Containers\AppSection\File\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\File\Models\File;
use App\Containers\AppSection\File\Tasks\CreateFileTask;
use App\Containers\AppSection\File\UI\API\Requests\CreateFileRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFileAction extends ParentAction
{
    public function __construct(
        private readonly CreateFileTask $createFileTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFileRequest $request): File
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createFileTask->run($data);
    }
}

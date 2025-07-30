<?php

namespace App\Containers\AppSection\File\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\File\Models\File;
use App\Containers\AppSection\File\Tasks\UpdateFileTask;
use App\Containers\AppSection\File\UI\API\Requests\UpdateFileRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFileAction extends ParentAction
{
    public function __construct(
        private readonly UpdateFileTask $updateFileTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFileRequest $request): File
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateFileTask->run($data, $request->id);
    }
}

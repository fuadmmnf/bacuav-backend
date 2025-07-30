<?php

namespace App\Containers\AppSection\File\Actions;

use App\Containers\AppSection\File\Models\File;
use App\Containers\AppSection\File\Tasks\FindFileByIdTask;
use App\Containers\AppSection\File\UI\API\Requests\FindFileByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFileByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindFileByIdTask $findFileByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindFileByIdRequest $request): File
    {
        return $this->findFileByIdTask->run($request->id);
    }
}

<?php

namespace App\Containers\AppSection\Election\Actions;

use App\Containers\AppSection\Election\Tasks\DeleteElectionTask;
use App\Containers\AppSection\Election\UI\API\Requests\DeleteElectionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteElectionAction extends ParentAction
{
    /**
     * @param DeleteElectionRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteElectionRequest $request): int
    {
        return app(DeleteElectionTask::class)->run($request->id);
    }
}

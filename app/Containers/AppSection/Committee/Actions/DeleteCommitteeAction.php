<?php

namespace App\Containers\AppSection\Committee\Actions;

use App\Containers\AppSection\Committee\Tasks\DeleteCommitteeTask;
use App\Containers\AppSection\Committee\UI\API\Requests\DeleteCommitteeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCommitteeAction extends ParentAction
{
    /**
     * @param DeleteCommitteeRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCommitteeRequest $request): int
    {
        return app(DeleteCommitteeTask::class)->run($request->id);
    }
}

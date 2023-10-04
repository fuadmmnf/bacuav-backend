<?php

namespace App\Containers\AppSection\Election\Actions;

use App\Containers\AppSection\Election\Models\Election;
use App\Containers\AppSection\Election\Tasks\FindElectionByIdTask;
use App\Containers\AppSection\Election\UI\API\Requests\FindElectionByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindElectionByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindElectionByIdRequest $request): Election
    {
        return app(FindElectionByIdTask::class)->run($request->id);
    }
}

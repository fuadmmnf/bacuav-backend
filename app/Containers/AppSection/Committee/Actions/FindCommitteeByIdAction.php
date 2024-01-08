<?php

namespace App\Containers\AppSection\Committee\Actions;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\Committee\Tasks\FindCommitteeByIdTask;
use App\Containers\AppSection\Committee\UI\API\Requests\FindCommitteeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCommitteeByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCommitteeByIdRequest $request): Committee
    {
        return app(FindCommitteeByIdTask::class)->run($request->id);
    }
}

<?php

namespace App\Containers\AppSection\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Election\Models\Election;
use App\Containers\AppSection\Election\Tasks\UpdateElectionTask;
use App\Containers\AppSection\Election\UI\API\Requests\UpdateElectionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateElectionAction extends ParentAction
{
    /**
     * @param UpdateElectionRequest $request
     * @return Election
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateElectionRequest $request): Election
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateElectionTask::class)->run($data, $request->id);
    }
}

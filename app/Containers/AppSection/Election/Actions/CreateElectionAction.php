<?php

namespace App\Containers\AppSection\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Election\Models\Election;
use App\Containers\AppSection\Election\Tasks\CreateElectionTask;
use App\Containers\AppSection\Election\UI\API\Requests\CreateElectionRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateElectionAction extends ParentAction
{
    /**
     * @param CreateElectionRequest $request
     * @return Election
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateElectionRequest $request): Election
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'description',
            'parent_id',
        ]);

        return app(CreateElectionTask::class)->run($data);
    }
}

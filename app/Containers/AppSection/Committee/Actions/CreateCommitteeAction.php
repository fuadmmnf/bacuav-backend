<?php

namespace App\Containers\AppSection\Committee\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\Committee\Tasks\CreateCommitteeTask;
use App\Containers\AppSection\Committee\UI\API\Requests\CreateCommitteeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCommitteeAction extends ParentAction
{
    /**
     * @param CreateCommitteeRequest $request
     * @return Committee
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCommitteeRequest $request): Committee
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'year',
        ]);

        return app(CreateCommitteeTask::class)->run($data);
    }
}

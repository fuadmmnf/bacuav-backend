<?php

namespace App\Containers\AppSection\Committee\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\Committee\Tasks\UpdateCommitteeTask;
use App\Containers\AppSection\Committee\UI\API\Requests\UpdateCommitteeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCommitteeAction extends ParentAction
{
    /**
     * @param UpdateCommitteeRequest $request
     * @return Committee
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCommitteeRequest $request): Committee
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'year',
        ]);

        return app(UpdateCommitteeTask::class)->run($data, $request->id);
    }
}

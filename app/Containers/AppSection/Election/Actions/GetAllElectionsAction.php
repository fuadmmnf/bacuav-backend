<?php

namespace App\Containers\AppSection\Election\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Election\Tasks\GetAllElectionsTask;
use App\Containers\AppSection\Election\UI\API\Requests\GetAllElectionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllElectionsRequest $request): mixed
    {
        return app(GetAllElectionsTask::class)->run();
    }
}

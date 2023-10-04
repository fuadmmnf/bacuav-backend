<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Tasks\GetAllCategoriesByTypeTask;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesByTypeRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCategoriesByTypeAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCategoriesByTypeRequest $request): mixed
    {
        $data = $request->sanitizeInput(['type']);
        return app(GetAllCategoriesByTypeTask::class)->run([$data['type']]);
    }
}

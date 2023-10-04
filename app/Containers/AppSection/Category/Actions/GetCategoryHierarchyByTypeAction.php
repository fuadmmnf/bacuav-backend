<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Tasks\GetAllCategoriesByTypeTask;
use App\Containers\AppSection\Category\Tasks\GetCategoryHierarchyTask;
use App\Containers\AppSection\Category\UI\API\Requests\GetCategoryHierarchyByTypeRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetCategoryHierarchyByTypeAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetCategoryHierarchyByTypeRequest $request): mixed
    {
        $data = $request->sanitizeInput(['type']);
        $categories = app(GetAllCategoriesByTypeTask::class)->run([$data['type']], true);
        return $categories->transform(function ($rootCategory) {
            $rootCategory->descendents = app(GetCategoryHierarchyTask::class)->run($rootCategory->id);
            return $rootCategory;
        });
    }
}

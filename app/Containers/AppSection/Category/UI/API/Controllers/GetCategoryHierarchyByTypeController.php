<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\AppSection\Category\Actions\GetAllCategoriesByTypeAction;
use App\Containers\AppSection\Category\Actions\GetCategoryHierarchyByTypeAction;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesByTypeRequest;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Requests\GetCategoryHierarchyByTypeRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetCategoryHierarchyByTypeController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetCategoryHierarchyByTypeRequest $request): array
    {
        $resources = app(GetCategoryHierarchyByTypeAction::class)->run($request);

        return $this->transform($resources, CategoryTransformer::class);
    }
}

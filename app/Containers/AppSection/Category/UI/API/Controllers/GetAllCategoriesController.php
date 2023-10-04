<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCategoriesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetAllCategoriesRequest $request): array
    {
        $resources = app(GetAllCategoriesAction::class)->run($request);

        return $this->transform($resources, CategoryTransformer::class);
    }
}

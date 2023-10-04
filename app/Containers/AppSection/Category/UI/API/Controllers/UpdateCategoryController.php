<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\UpdateCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCategoryController extends ApiController
{
    /**
     * @param UpdateCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateCategoryRequest $request): array
    {
        $resource = app(UpdateCategoryAction::class)->run($request);

        return $this->transform($resource, CategoryTransformer::class);
    }
}

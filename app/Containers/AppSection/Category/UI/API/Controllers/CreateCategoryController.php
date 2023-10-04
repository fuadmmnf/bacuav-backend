<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\CreateCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCategoryController extends ApiController
{
    /**
     * @param CreateCategoryRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateCategoryRequest $request): JsonResponse
    {
        $resource = app(CreateCategoryAction::class)->run($request);

        return $this->created($this->transform($resource, CategoryTransformer::class));
    }
}

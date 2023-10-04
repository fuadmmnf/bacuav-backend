<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\AppSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCategoryByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindCategoryByIdRequest $request): array
    {
        $resource = app(FindCategoryByIdAction::class)->run($request);

        return $this->transform($resource, CategoryTransformer::class);
    }
}

<?php

namespace App\Containers\AppSection\Election\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Election\Actions\GetAllElectionsAction;
use App\Containers\AppSection\Election\UI\API\Requests\GetAllElectionsRequest;
use App\Containers\AppSection\Election\UI\API\Transformers\ElectionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllElections(GetAllElectionsRequest $request): array
    {
        $elections = app(GetAllElectionsAction::class)->run($request);

        return $this->transform($elections, ElectionTransformer::class);
    }
}

<?php

namespace App\Containers\AppSection\File\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\File\Actions\UpdateFileAction;
use App\Containers\AppSection\File\UI\API\Requests\UpdateFileRequest;
use App\Containers\AppSection\File\UI\API\Transformers\FileTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateFileController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateFileRequest $request, UpdateFileAction $action): array
    {
        $file = $action->run($request);

        return $this->transform($file, FileTransformer::class);
    }
}

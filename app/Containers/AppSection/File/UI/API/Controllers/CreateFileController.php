<?php

namespace App\Containers\AppSection\File\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\File\Actions\CreateFileAction;
use App\Containers\AppSection\File\UI\API\Requests\CreateFileRequest;
use App\Containers\AppSection\File\UI\API\Transformers\FileTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateFileController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateFileRequest $request, CreateFileAction $action): JsonResponse
    {
        $file = $action->run($request);

        return $this->created($this->transform($file, FileTransformer::class));
    }
}

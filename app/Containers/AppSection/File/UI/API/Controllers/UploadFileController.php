<?php

namespace App\Containers\AppSection\File\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\File\Actions\UploadFileAction;
use App\Containers\AppSection\File\UI\API\Requests\UploadFileRequest;
use App\Containers\AppSection\File\UI\API\Transformers\FileTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UploadFileController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UploadFileRequest $request): array
    {
        $file = app(UploadFileAction::class)->transactionalRun($request);

        return $this->transform($file, FileTransformer::class);

    }
}

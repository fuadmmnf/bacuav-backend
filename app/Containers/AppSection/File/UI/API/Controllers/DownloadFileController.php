<?php

namespace App\Containers\AppSection\File\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\File\Actions\DownloadFileAction;
use App\Containers\AppSection\File\Actions\FindFileByIdAction;
use App\Containers\AppSection\File\UI\API\Requests\DownloadFileRequest;
use App\Containers\AppSection\File\UI\API\Requests\FindFileByIdRequest;
use App\Containers\AppSection\File\UI\API\Transformers\FileTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class DownloadFileController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(DownloadFileRequest $request)
    {
        return app(DownloadFileAction::class)->run($request);
    }
}

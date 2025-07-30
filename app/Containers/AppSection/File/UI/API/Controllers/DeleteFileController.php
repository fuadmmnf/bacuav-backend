<?php

namespace App\Containers\AppSection\File\UI\API\Controllers;

use App\Containers\AppSection\File\Actions\DeleteFileAction;
use App\Containers\AppSection\File\UI\API\Requests\DeleteFileRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteFileController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteFileRequest $request, DeleteFileAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}

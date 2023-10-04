<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\RestoreTrashedUserAction;
use App\Containers\AppSection\User\UI\API\Requests\RestoreTrashedUserRequest;

use App\Ship\Parents\Controllers\ApiController;

class RestoreTrashedUserController extends ApiController
{
    public function __construct(
        private readonly RestoreTrashedUserAction $restoreTrashedUserAction
    ) {
    }

    public function __invoke(RestoreTrashedUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->restoreTrashedUserAction->run($request);

        return $this->noContent();
    }
}

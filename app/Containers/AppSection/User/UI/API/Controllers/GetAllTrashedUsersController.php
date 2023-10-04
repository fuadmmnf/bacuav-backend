<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\GetAllTrashedUsersAction;
use App\Containers\AppSection\User\Actions\GetAllUsersAction;
use App\Containers\AppSection\User\UI\API\Requests\GetAllTrashedUsersRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetAllTrashedUsersController extends ApiController
{
    public function __construct(
        private readonly GetAllTrashedUsersAction $getAllTrashedUsersAction
    ) {
    }

    public function __invoke(GetAllTrashedUsersRequest $request): array
    {
        $users = $this->getAllTrashedUsersAction->run();

        return $this->transform($users, UserTransformer::class);
    }
}

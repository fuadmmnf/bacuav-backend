<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\RestoreTrashedUserTask;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\RestoreTrashedUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class RestoreTrashedUserAction extends ParentAction
{
    public function __construct(
        private readonly RestoreTrashedUserTask $restoreTrashedUserTask
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(RestoreTrashedUserRequest $request)
    {
        return $this->restoreTrashedUserTask->run($request->id);
    }
}

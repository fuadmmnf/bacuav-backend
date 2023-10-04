<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Throwable;

class CreateAdminAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserAndAssignRolesSubAction $createUserAndAssignRolesSubAction
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws Throwable
     * @throws NotFoundException
     */
    public function run(array $data): User
    {
        $adminRoleName = config('appSection-authorization.admin_role');
        $user = $this->createUserAndAssignRolesSubAction->run($data, [$adminRoleName]);

        return $user;
    }
}

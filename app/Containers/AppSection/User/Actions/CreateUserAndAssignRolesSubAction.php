<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\Authorization\Tasks\AssignRolesToUserTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Parents\Actions\SubAction;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Support\Facades\DB;

class CreateUserAndAssignRolesSubAction extends SubAction
{
    public function __construct(
        private readonly CreateUserTask        $createUserTask,
        private readonly FindRoleTask          $findRoleTask,
        private readonly AssignRolesToUserTask $assignRolesToUserTask
    ) {
    }

    public function run(ParentRequest|array $request, array $roleNames): User
    {
        $data = is_array($request) ? $request : $request->sanitizeInput([...array_keys(config('appSection-authentication.login.attributes')),
            ...['password', 'name']]);

        return DB::transaction(function () use ($data, $roleNames) {
            $user = $this->createUserTask->run($data);
            foreach (array_keys(config('auth.guards')) as $guardName) {
                foreach ($roleNames as $role) {
                    $roleModel = $this->findRoleTask->run($role, $guardName);
                    $this->assignRolesToUserTask->run($user, $roleModel);
                }
            }
            //            $user->save();

            return $user;
        });
    }
}

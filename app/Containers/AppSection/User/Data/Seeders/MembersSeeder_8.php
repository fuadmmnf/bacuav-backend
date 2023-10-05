<?php

namespace App\Containers\AppSection\User\Data\Seeders;

use App\Containers\AppSection\Authorization\Actions\AssignRolesToUserAction;
use App\Containers\AppSection\Authorization\Tasks\AssignRolesToUserTask;
use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Containers\AppSection\User\Actions\CreateUserAndAssignRolesSubAction;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class MembersSeeder_8 extends ParentSeeder
{
    public function __construct()
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $users = User::factory()->count(100)->create();
        foreach ($users as $user) {
            app(AssignRolesToUserTask::class)->run(user: $user, roles: ['member']);
        }
    }
}

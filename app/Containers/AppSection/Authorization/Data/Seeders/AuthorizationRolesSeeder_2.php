<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationRolesSeeder_2 extends ParentSeeder
{
    public function __construct(
        private readonly CreateRoleTask $createRoleTask
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $roles = [
            [config('appSection-authorization.admin_role'), 'Administrator', 'Super Administrator Role'],
            ['member', 'Member', 'Member of Office'],
        ];
        // Default Roles for every Guard ----------------------------------------------------------------
        foreach (array_keys(config('auth.guards')) as $guardName) {
            foreach ($roles as [$name, $desc, $displayName]) {
                $this->createRoleTask->run($name, $desc, $displayName, $guardName);
            }
        }
    }
}

<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_7 extends ParentSeeder
{
    public function __construct(
        private readonly CreateAdminAction $createAdminAction
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(): void
    {
        // Default Users (with their roles) ---------------------------------------------
        $this->createSuperAdmin();
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    private function createSuperAdmin(): void
    {
        $userData = [
            'mobile' => '00000000000',
            'email' => 'admin@bacuav.com',
            'password' => 'admin',
            'name' => 'Super Admin',
            'name_bangla' => 'admin',
            'is_verified' => true
        ];

        $this->createAdminAction->run($userData);
    }
}

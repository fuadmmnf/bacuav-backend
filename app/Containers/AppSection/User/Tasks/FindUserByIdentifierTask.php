<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindUserByIdentifierTask extends ParentTask
{
    public function __construct(
        protected readonly UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(string $identifierName, string $identifier): User
    {
        $user = $this->repository->findByField($identifierName, $identifier)->first();

        return $user ?? throw new NotFoundException();
    }
}

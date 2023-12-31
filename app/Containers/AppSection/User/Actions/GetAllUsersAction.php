<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Tasks\GetAllUsersTask;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUsersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersAction extends ParentAction
{
    public function __construct(
        private readonly GetAllUsersTask $getAllUsersTask
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllUsersRequest $request): mixed
    {
        return $this->getAllUsersTask->addRequestCriteria(null, ['commissionerate_id', 'division_id', 'circle_id'])->run(onlyVerified: filter_var($request->query('verified'), FILTER_VALIDATE_BOOLEAN) ?? true);
    }
}

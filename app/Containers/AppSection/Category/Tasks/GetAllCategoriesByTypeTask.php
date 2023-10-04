<?php

namespace App\Containers\AppSection\Category\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Ship\Criterias\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCategoriesByTypeTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($types, bool $is_root = false): mixed
    {
        if ($is_root) {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('parent_id', null));
        }
        return $this->repository->findWhereIn('type', $types);
    }
}

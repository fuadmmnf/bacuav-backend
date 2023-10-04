<?php

namespace App\Containers\AppSection\Category\Data\Repositories;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CategoryRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => '=',
        'type' => '=',
//        'parent_id' => '=',
    ];

    public function getDecendentsHierarchy($root_id)
    {
        return Category::defaultOrder()->descendantsOf($root_id);
    }
}

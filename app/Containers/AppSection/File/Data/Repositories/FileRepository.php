<?php

namespace App\Containers\AppSection\File\Data\Repositories;

use App\Containers\AppSection\File\Models\File;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of File
 *
 * @extends ParentRepository<TModel>
 */
class FileRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
        'title' => 'like',
        'owner_type' => 'like',
        'owner_id' => '=',
    ];
}

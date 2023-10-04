<?php

namespace App\Containers\AppSection\Category\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Kalnoy\Nestedset\NodeTrait;

class Category extends ParentModel
{
    use NodeTrait;

    protected $fillable = [
        'name',
        'type',
        'parent_id',
        '_lft',
        '_rgt',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Category';
}

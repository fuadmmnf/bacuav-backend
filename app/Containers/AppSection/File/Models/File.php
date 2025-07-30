<?php

namespace App\Containers\AppSection\File\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class File extends ParentModel
{
    protected $fillable = [
        'title',
        'path',
        'filename',
        'mime_type',
        'size',
        'owner_id',
        'owner_type',
        'additional_info',
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
